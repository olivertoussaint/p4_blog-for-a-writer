<?php
namespace Blog\JeanForteroche\Model;
require_once("model/DatabaseManager.php");

class UserManager extends DatabaseManager
{
    
    public function loginMember($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, password, role FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }

    public function checkPseudo($pseudo)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM members WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $pseudoChecked = $req->fetch();

        return $pseudoChecked;
    }

    public function checkMail($email) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT email FROM members WHERE email = ?');
        $req->execute(array($email));
        $emailChecked = $req->fetch();

        return $emailChecked;
    }
    
    public function createMember($pseudo, $email, $password )
    {
        $db = $this->dbConnect();
        $newMember = $db->prepare('INSERT INTO members(pseudo, email, password, role) VALUES (?, ?, ?, 0)');
        $newMember->execute(array($pseudo, $email, $password));

        return $newMember;
    }

    public function getMembers() {
        $db = $this->dbConnect();
        $members = $db->query('SELECT id, pseudo, role FROM members ORDER BY id');

        return $members;
    }

    public function inTable($table)
    {
        $db     = $this->dbconnect();
        $query  = $db->query('SELECT COUNT(id) FROM ' . $table);
        $nombre = $query->fetch();
        
        return $nombre;
    }
}