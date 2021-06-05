<?php
namespace App\Services;

require './vendor/autoload.php';

use Kreait\Firebase\Factory;

class FirebaseService{
    private $firebase;
    private $db;

    public function __construct(){
        $this->firebase = (new Factory)->withServiceAccount('./key/imoney-9eb10-firebase-adminsdk-4te36-163d719092.json');
        $this->db = $this->firebase->createDatabase();
    }

    public function tipoCambio(){
        $reference = $this->db->getReference('/tipoCambio');
        $registros = $reference->getValue();
        return $registros;
    }
}
