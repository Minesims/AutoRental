<?php
declare(strict_types=1);
require_once('VehiculeInterface.php');

/**
 * CONSIGNES : Classe Abstraite 'Vehicule'
 * * 1. Déclarez la classe comme "abstract" et faites-y implémenter "VehiculeInterface".
 * * 2. Déclarez les attributs PROTECTED suivants avec leur typage :
 * - immatriculation (string)
 * - marque (string)
 * - prixDeBase (float)
 * - estDisponible (bool)
 * * 3. Créez le constructeur :
 * - Il doit accepter et initialiser : l'immatriculation, la marque et le prix de base.
 * - Par défaut, l'attribut 'estDisponible' doit être initialisé à 'true'.
 * * 4. Implémentez les méthodes requises par l'interface ainsi que les getters nécessaires.
 * Note : La méthode calculerTarifJournalier() peut être laissée abstraite ici.
 */

// Votre code POO ci-dessous :

// Déclaration de la classe Vehicule en abstraite et implémentant la classe VehiculeInterface
abstract class Vehicule implements VehiculeInterface {

    // Attributs Protégés - Sécurisés mais partagés avec les classes enfants
    protected string    $immatriculation;
    protected string    $marque;
    protected float     $prixDeBase;
    protected bool      $estDisponible = true;

    /**
     * Instancie les valeurs communes des attributs de la classe
     * 
     * @param string $immatriculation Le numéro de la plaque d'immatriculation du véhicule
     * @param string $marque Marque du véhicule
     * @param float $prixDeBase Montant du tarif de location (/jour)
     */
    public function __construct(string $immatriculation, string $marque, float $prixDeBase) {
        $this->immatriculation =    $immatriculation;
        $this->marque =             $marque;
        $this->prixDeBase =         $prixDeBase;
    }

    /**
     * Récupère la valeur de l'attribut $immatriculation
     * 
     * @return string $immatriculation
     */
    public function getImmatriculation(): string {
        return $this->immatriculation;
    }

    /**
     * Récupère la valeur de l'attribut $marque
     * 
     * @return string $marque
     */
    public function getMarque(): string {
        return $this->marque;
    }

    /**
     * Récupère la valeur de l'attribut $prixDeBase
     * 
     * @return float $prixDeBase
     */
    public function getPrixDebase(): float {
        return $this->prixDeBase;
    }

    /**
     * Récupère la valeur de l'attribut $estDisponible
     * 
     * @return string $estDisponible
     */
    public function estDisponible(): bool {
        return $this->estDisponible;
    }

    /**
     * Modifie la valeur de l'attribut $estDisponible
     * 
     * @param bool $statut État de la disponibilité du véhicule - Uniquement True ou False
     */
    public function setDisponibilite(bool $statut): void {
        $this->estDisponible = $statut;
    }

    /**
     * Fonction abstraite appelée dans les classes enfants
     */
    abstract public function calculerTarifJournalier(): float;
}
?>