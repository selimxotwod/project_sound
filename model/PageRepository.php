<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 15/06/2016
 * Time: 21:55
 */
namespace Model;

class PageRepository
{

    private $PDO;


    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function approuver()
    {
        $sql = "UPDATE `signataire`
        SET
          `public` = 1
        WHERE id = :id
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue( ':id' , $_GET['id'],\PDO::PARAM_STR );
        $stmt->execute();
        header('Location: admin/index.php?a=list');
        exit;
    }


    public function desapprouver()
    {
        $sql = "UPDATE `signataire`
        SET
          `public` = 0
        WHERE id = :id
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue( ':id' , $_GET['id'],\PDO::PARAM_STR );
        $stmt->execute();
        header('Location: admin/index.php?a=list');
        exit;
    }

    public function insert(array $dataa)
    {

        $sql = "INSERT INTO `signataire`
        (nom, prenom, commentaire, mail, parrain, date )
        VALUES
        (:nom, :prenom, :commentaire, :mail, :parrain, NOW())
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':nom', $dataa['nom'], \PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $dataa['prenom'], \PDO::PARAM_STR);
        $stmt->bindValue(':commentaire', $dataa['commentaire'], \PDO::PARAM_STR);
        $stmt->bindValue(':mail', $dataa['mail'], \PDO::PARAM_STR);
        $stmt->bindValue(':parrain', $_GET['id'], \PDO::PARAM_STR);
        $stmt->execute();
        header('Location: index.php?a=partager&id='.$dataa['mail']);

    }

    public function addShare()
    {
        $sql = "UPDATE `signataire`
        SET
          `lien_partage` = 1
        WHERE mail = :id
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue( ':id' , $_GET['id'],\PDO::PARAM_STR );
        $stmt->execute();
    }


    public function addNeveu()
    {
        $sql = "UPDATE `signataire`
        SET
          `nbr_neveu` = `nbr_neveu` + 1
        WHERE mail = :id
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue( ':id' , $_GET['id'],\PDO::PARAM_STR );
        $stmt->execute();

    }

    public function getNbrNeveu()
    {
        $sql = "SELECT
                    `nbr_neveu`
                FROM
                    `signataire`
                WHERE
                    id = :id
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'],\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getBestParrain()
    {
        $sql = "SELECT
                    `id`,
                    `nom`,
                    `prenom`,
                    `nbr_neveu`
                FROM
                    `signataire`
                ORDER BY
                    nbr_neveu DESC
                LIMIT
                    3
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getParrainLessFive()
    {
        $sql = "SELECT COUNT(`id`) as count
                FROM
                    `signataire`
                WHERE
                    nbr_neveu < 5
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getParrainFive()
    {
        $sql = "SELECT COUNT(`id`) as count
                FROM
                    `signataire`
                WHERE
                    nbr_neveu >= 5 AND nbr_neveu < 10
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getParrainTen()
    {
        $sql = "SELECT COUNT(`id`) as count
                FROM
                    `signataire`
                WHERE
                    nbr_neveu >= 10 AND nbr_neveu < 15
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getParrainFifteen()
    {
        $sql = "SELECT COUNT(`id`) as count
                FROM
                    `signataire`
                WHERE
                    nbr_neveu >= 15
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getAllPagination(array $numbers)
    {
        $sql = "SELECT
                    `id`,
                    `nom`,
                    `prenom`,
                    `mail`,
                    `commentaire`,
                    `public`,
                    `lien_partage`,
                    `nbr_neveu`,
                    `parrain`,
                    `date`
                FROM
                    `signataire`
                 WHERE
                  `public` = 1
                ORDER BY
                    `date` DESC
                 LIMIT ".(($numbers[1]-1)*$numbers[0]).",$numbers[0]";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $sql = "SELECT
                    `id`,
                    `nom`,
                    `prenom`,
                    `mail`,
                    `commentaire`,
                    `public`,
                    `lien_partage`,
                    `nbr_neveu`,
                    `parrain`,
                    `date`
                FROM
                    `signataire`
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getComValid()
    {
        $sql = "SELECT
                     `id`,
                    `nom`,
                    `prenom`,
                    `mail`,
                    `commentaire`,
                    `public`,
                    `date`
                FROM
                    `signataire`
                WHERE
                    public = 1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getComUnvalid()
    {
        $sql = "SELECT
                     `id`,
                    `nom`,
                    `prenom`,
                    `mail`,
                    `commentaire`,
                    `public`,
                    `date`
                FROM
                    `signataire`
                WHERE
                    public = 0
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getNbrSignature()
    {
        $sql = "SELECT COUNT(`id`) as count FROM `signataire`";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


    public function getNbrSharer()
    {
        $sql = "SELECT COUNT(`lien_partage`) as count FROM `signataire` WHERE `lien_partage` = 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getNbrComValid()
    {
        $sql = "SELECT COUNT(`id`) as count FROM `signataire` WHERE `public` = 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


    public function addVisitor()
    {
        $sql = "UPDATE `total_visiteur`
        SET
          `total` = `total` + 1
        WHERE id = 1
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }

    public function addSeeForm()
    {
        $sql = "UPDATE `total_visiteur`
        SET
          `total_see_form` = `total_see_form` + 1
        WHERE id = 1
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }

    public function addDown()
    {
        $sql = "UPDATE `total_visiteur`
        SET
          `total_down` = `total_down` + 1
        WHERE id = 1
        LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }

    public function getDown()
    {
        $sql = "SELECT
                    `total_down`
                FROM
                    `total_visiteur`
                WHERE
                    id = 1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getAllVisitor()
    {
        $sql = "SELECT
                    `total`
                FROM
                    `total_visiteur`
                WHERE
                    id = 1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getAllSeeForm()
    {
        $sql = "SELECT
                    `total_see_form`
                FROM
                    `total_visiteur`
                WHERE
                    id = 1
                ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


}