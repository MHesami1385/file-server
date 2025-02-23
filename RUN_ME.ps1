# 1. Create the group "Users(file-server)" if it doesn't already exist
$groupName = "Users(file-server)"
$group = Get-LocalGroup -Name $groupName -ErrorAction SilentlyContinue
if (-not $group) {
    New-LocalGroup -Name $groupName -Description "Group for file server users"
    Write-Host "Group '$groupName' created."
} else {
    Write-Host "Group '$groupName' already exists. Skipping creation."
}

# 2. Create the .\files folder and share it if it doesn't already exist
$folderPath = Join-Path -Path $PSScriptRoot -ChildPath "files"
if (-not (Test-Path -Path $folderPath)) {
    New-Item -Path $folderPath -ItemType Directory
    Write-Host "Folder '$folderPath' created."
} else {
    Write-Host "Folder '$folderPath' already exists. Skipping creation."
}

# Share the folder with everyone with full network permissions
$shareName = "files"
$share = Get-SmbShare -Name $shareName -ErrorAction SilentlyContinue
if (-not $share) {
    # Use the full path for sharing
    New-SmbShare -Name $shareName -Path $folderPath -FullAccess "Everyone"
    Write-Host "Folder '$folderPath' shared with Everyone."
} else {
    Write-Host "Folder '$folderPath' is already shared. Skipping sharing."
}

# 3. Set the security permissions for the .\files directory
$acl = Get-Acl -Path $folderPath

# Disable inheritance and remove inherited permissions
$acl.SetAccessRuleProtection($true, $false)

# Remove all existing permissions
$acl.Access | ForEach-Object { $acl.RemoveAccessRule($_) }

# Add the required permissions
# Administrators: Full Control
$adminRule = New-Object System.Security.AccessControl.FileSystemAccessRule("BUILTIN\Administrators", "FullControl", "ContainerInherit,ObjectInherit", "None", "Allow")

# Users(file-server): ListDirectory only (can see the list of items but cannot open or read files)
$userRule = New-Object System.Security.AccessControl.FileSystemAccessRule("WIN-PTCGO0MLRV9\Users(file-server)", "ListDirectory", "None", "None", "Allow")

$acl.AddAccessRule($adminRule)
$acl.AddAccessRule($userRule)

# Apply the new permissions
Set-Acl -Path $folderPath -AclObject $acl
Write-Host "Permissions set for '$folderPath'."