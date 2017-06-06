<?php

class Vehicule{
    private $litreEssence;
    private $Reservoir

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence(){
        $this -> litreEssence = $litre;
    }

    public function getReservoir(){
        return $this -> reservoir;
    }

    public function SetReservoir(){
        $this -> reservoir = $res;
    }
}


class Pompe{
    private $litreEssence;

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function donneEssence(Vehicule $v){
        $litre_a_mettre = $v -> get reservoir() -$v -> getLitreEssence();

        $v -> setLitreEssence($v -> getLitreEssence() + $litre_a_mettre);

        $this -> setLitreEssence($this -> getLitreEssence() - $litre_a_mettre);
    }
}

$vehicule = new Vehicule;
$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50);

$pompe = new Pompe;
$pompe ->setLitreEssence(800);

echo 'Dans le vehicule il y a '. $vehicule ->getLitreEssence().'litres <hr>';
echo 'Dans la pompe il y a '. $pompe ->getLitreEssence().'litres <hr>';

$pompe -> donneEssence($vehicule);

echo 'Apres ravitaillement: '. $vehicule ->getLitreEssence().'litres <hr>';
echo 'Dans le vehicule il y a '. $vehicule ->getLitreEssence().'litres <hr>';

echo 'Dans la pompe il y a '. $pompe ->getLitreEssence().'litres <hr>';
