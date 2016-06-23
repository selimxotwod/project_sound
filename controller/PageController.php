<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 15/06/2016
 * Time: 21:55
 */

namespace Controller;

use Model\PageRepository;

class PageController
{

    public $countVisitor = 0;

    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
    }

    public function form()
    {

        if(count($_POST) === 0)
        {

            $dataSignataire = $this->repository->getNbrSignature();
            $addVisitor = $this->repository->addSeeForm();
            $dataSharer = $this->repository->getNbrSharer();
            $dataComValid = $this->repository->getNbrComValid();

            $nbArt = $dataComValid->count;
            $perPage = 3;
            $nbPage = ceil($nbArt/$perPage);// ceil arrondi a l'entier supérieur
            if(isset($_GET['page']) && $_GET['page']>0 && $_GET['page']<=$nbPage){
                $cPage= $_GET['page'];
            }
            else{
                $cPage=1;
            }
            $numbers = array ($perPage, $cPage);
            $data = $this->repository->getAllPagination($numbers);
            include "view/form.php";
        }
        else
        {
            $dataa = $_POST;
            $data = $this->repository->insert($dataa);

            $message = "Merci pour votre participation!";
            mail( $dataa['mail'] , 'Votre signature à bien été comptabilisé.', $message);
        }
        if (isset($_GET['id']) && count($_POST) > 0)
        {
            $dataNeveu = $this->repository->addNeveu();
            $dataNbrNeveu = $this->repository->getNbrNeveu();

            if($dataNbrNeveu->nbr_neveu == 5)
            {
                $message1 = "Félicitaion, graçe à vous 5 personnes ont signé la pétition!";
                mail( $_GET['id'] , 'Vous avez désormais 5 filleuls !', $message1);
            }
        }
    }


    public function partager()
    {
        $id = $_GET['id'];
        if($_GET['p'] == 'facebook')
        {
            $data = $this->repository->addShare();
            header('Location: https://www.facebook.com/sharer/sharer.php?u=http://www.histoiredepeche.fr/?a=ajouter%26id='.$id);
        }
        else if($_GET['p'] == 'twitter')
        {
            $data = $this->repository->addShare();
            header('Location: https://twitter.com/intent/tweet/?url=http://www.histoiredepeche.fr/?a=ajouter%26id='.$id.'&text= Signez cette pétition contre la surpèche des poissons');
        }

        include "view/confirmation.php";

    }


    public function listeMessageAdmin()
    {
        $data = $this->repository->getAll();
        $dataValid = $this->repository->getComValid();
        $dataUnvalid = $this->repository->getComUnvalid();
        include "view/admin/commentaire.php";

        if(isset($_GET['id']) && $_GET['p'] == 'approuve')
        {
            $dataValide = $this->repository->approuver();
        }
        elseif(isset($_GET['id']) && $_GET['p'] == 'desapprouve')
        {
            $dataUnvalide = $this->repository->desapprouver();
        }
    }

    public function addDown()
    {
        $data = $this->repository->addDown();
        include "view/displayPage.php";
    }


    public function statistiques()
    {
        $data = $this->repository->getNbrSignature();
        $dataSharer = $this->repository->getNbrSharer();
        $dataBestParrain = $this->repository->getBestParrain();
        $countVisitor = $this->repository->getAllVisitor();
        $dataAllSeeForm = $this->repository->getAllSeeForm();
        $dataAllDown = $this->repository->getDown();

        $dataLessFive = $this->repository->getParrainLessFive();
        $dataFive = $this->repository->getParrainFive();
        $dataTen = $this->repository->getParrainTen();
        $dataFifteen = $this->repository->getParrainFifteen();


        $dataAll = $this->repository->getAll();


        include "view/admin/stats.php";
    }


    public function displayPage()
    {
        $data = $this->repository->addVisitor();
        include "view/displayPage.php";
    }
}