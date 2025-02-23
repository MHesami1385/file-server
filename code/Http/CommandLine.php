<?php

namespace Http;

class CommandLine
{
    const FILES_DIRECTORY = __DIR__ . "\\..\\..\\files\\";
    const PERMISSIONS = "(OI)(CI)(W,RD,REA,X,DC,RA)";

    public static function createUser($username, $password, $fullname)
    {
        $cmd = "net user $username $password /add /passwordchg:yes /expires:never";
        static::execute($cmd);

        static::setDescription($username, $fullname);
        static::setFullname($username, $fullname);
        static::addToGroup($username);
        static::makeDirectory($username);
        static::setPermissions($username);
    }

    public static function changePassword($username, $password)
    {
        $cmd = "net user $username $password";
        static::execute($cmd);
    }

    public static function deleteUser($username)
    {
        $cmd = "net user $username /delete";
        static::execute($cmd);
        static::removeDirectory($username);
    }

    public static function addToGroup($username, $group = "Users(file-server)")
    {
        $cmd = "net localgroup $group $username /add";
        static::execute($cmd);
    }

    public static function setDescription($username)
    {
        $cmd = "net user $username /comment:\"A file-server user\"";
        static::execute($cmd);
    }

    public static function setFullname($username, $fullname)
    {
        $cmd = "net user $username /fullname:\"$fullname\"";
        static::execute($cmd);
    }

    public static function setPermissions($username)
    {
        $folder = static::FILES_DIRECTORY . $username;

        $cmd = "icacls \"$folder\" /grant $username:" . static::PERMISSIONS;
        static::execute($cmd);
    }

    public static function makeDirectory($username)
    {
        $cmd = "mkdir " . static::FILES_DIRECTORY . $username;
        static::execute($cmd);
    }


    public static function removeDirectory($username)
    {
        $cmd = "rmdir " . static::FILES_DIRECTORY . "$username /s /q";
        static::execute($cmd);
    }

    public static function execute($cmd)
    {
        exec(escapeshellcmd($cmd));
    }
}