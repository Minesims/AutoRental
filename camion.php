<?php
declare(strict_types=1);
require_once('VehiculeInterface.php');
require_once("vehicule.php");

/**
 * CONSIGNES : Classe 'Camion'
 * * 1. Faites hériter cette classe de la classe abstraite 'Vehicule'.
 * * 2. Ajoutez un attribut SPÉCIFIQUE et PRIVÉ :
 * - chargeUtileMax (float) -> Exprimé en tonnes
 * * 3. Créez le constructeur :
 * - Il doit appeler le constructeur parent pour initialiser l'immatriculation, la marque et le prix de base.
 * - Il doit initialiser la charge utile maximale.
 * * 4. Implémentez / Surchargez la méthode 'calculerTarifJournalier()' :
 * - RÈGLE MÉTIER : Le tarif est égal au prix de base du véhicule auquel on ajoute une majoration fixe de 20.0 € par tonne de charge utile maximale.
 */

// Votre code POO ci-dessous :
class Camion extends Vehicule {
    
    // Attributs
    #[MassUnit("tonnes")] // Transmission de l'information spécifique au poids
    private float   $chargeUtileMax;

    /**
     * Instancie les valeurs des attributs de la classe, récupère le __construct de la classe parent et ajoute l'attribut spécifique
     * 
     * @param string $immatriculation Le numéro de la plaque d'immatriculation du véhicule
     * @param string $marque Marque du véhicule
     * @param float $prixDeBase Montant du tarif de location (/jour)
     * @param float $chargeUtileMax Charge utile maximum que le tracteur peut porter
     * 
     * @throws InvalidArgumentException Si la charge utile maximum indiquée est négative
     */
    public function __construct(string $immatriculation, string $marque, float $prixDeBase, float $chargeUtileMax) {
        if ($chargeUtileMax < 0) {
            throw new InvalidArgumentException("La charge utile ne peut pas être négative.");
        }
        parent::__construct($immatriculation, $marque, $prixDeBase);
        $this->chargeUtileMax = $chargeUtileMax;
    }

    /**
     * Calcul le prix de location final - applique une majoration de 20.0 € par tonne de charge utile maximale
     * 
     * @return float $prixActualise Montant final à indiquer
     */
    public function calculerTarifJournalier(): float {
        return $this->prixDeBase + (20.0 * $this->chargeUtileMax);
    }
}

// Instance de la class MassUnit pour gérer la condition spécifique de poids

// Metadata
#[Attribute(Attribute::TARGET_PROPERTY)]
class MassUnit {

    // Attributs
    // public OBLIGATOIRE pour permettre l'accès aux données
    public string   $unit;
    public string   $expectedUnit = "tonnes";

    /**
     * Instancie la valeur $unit 
     * 
     * @param string $unit Récupère la valeur indiquée par l'utilisateur
     * @throws InvalidArgumentException Si l'unité indiquée ne correspond pas à l'attribut $expectedUnit ("tonnes")
     */
    public function __construct(string $unit) {
        // Vérification que l'unité indiquée est égal à l'unité attendu
        if ($unit != $this->expectedUnit) {
            throw new InvalidArgumentException("La charge utile doit être exprimée en ".$this->expectedUnit.". Vous avez indiqué : ".$this->unit.".");
        }
        $this->unit = $unit;
    }
}
?>