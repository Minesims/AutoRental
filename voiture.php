<?php
declare(strict_types=1);
require_once('VehiculeInterface.php');
require_once("vehicule.php");

/**
 * CONSIGNES : Classe 'Voiture'
 * * 1. Faites hériter cette classe de la classe abstraite 'Vehicule'.
 * * 2. Ajoutez un attribut et PRIVÉ :
 * - nombreDePortes (int) -> Indique le nombre de portes
 * * 3. Créez le constructeur :
 * - Il doit appeler le constructeur parent pour initialiser l'immatriculation, la marque et le prix de base.
 * - Il doit initialiser le nombre de portes.
 * * 4. Implémentez / Surchargez la méthode 'calculerTarifJournalier()' :
 * - RÈGLE MÉTIER : Le tarif est égal au prix de base du véhicule auquel on applique une réduction de 10% si la voiture possède moins de 4 portes.
 */

// Votre code POO ci-dessous :

// Déclaration de la classe Voiture, enfant de la classe Vehicule
class Voiture extends Vehicule {

    // Attributs Privés - Spécifique à la classe
    private int $nombreDePortes;

    /**
     * Instancie les valeurs des attributs de la classe, récupère le __construct de la classe parent et ajoute l'attribut spécifique
     * 
     * @param string $immatriculation Le numéro de la plaque d'immatriculation du véhicule
     * @param string $marque Marque du véhicule
     * @param float $prixDeBase Montant du tarif de location (/jour)
     * @param int $nombreDePortes Nombre de portes du véhicule
     * 
     * @throws InvalidArgumentException Si le nombre de portes indiqué est négatif
     */
    public function __construct(string $immatriculation, string $marque, float $prixDeBase, int $nombreDePortes) {
        if ($nombreDePortes < 0) {
            throw new InvalidArgumentException("Le nombre de portes ne peux être négatif.");
        }
        parent::__construct($immatriculation, $marque, $prixDeBase);
        $this->nombreDePortes = $nombreDePortes;
    }

    /**
     * Calcul le prix de location final - applique une réduction si le nombre de portes indiqués est inférieur à 4
     * 
     * @return float $prixActualise Montant final à indiquer
     */
    public function calculerTarifJournalier(): float {
        $prixActualise = $this->prixDeBase;
        if ($this->nombreDePortes < 4) {
            $prixActualise = $this->prixDeBase - ($this->prixDeBase * 0.1);
        }
        return $prixActualise;
    }
}
?>