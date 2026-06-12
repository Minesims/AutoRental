<?php
declare(strict_types=1);
require_once('VehiculeInterface.php');
require_once('vehicule.php');
require_once('voiture.php');
require_once('camion.php');

/**
 * CONSIGNES : Classe 'GestionnaireParc'
 * * 1. Ajoutez un attribut PRIVÉ :
 * - vehicules (array) -> Doit être initialisé comme un tableau vide.
 * * 2. Implémentez la méthode : ajouterVehicule(VehiculeInterface $vehicule): void
 * - Elle doit ajouter le véhicule reçu en paramètre dans le tableau 'vehicules'.
 * * 3. Implémentez la méthode : getVehiculesDisponibles(): array
 * - Elle doit filtrer le tableau et retourner UNIQUEMENT les objets véhicules dont la disponibilité est à 'true'.
 * * 4. Implémentez la méthode : calculerRevenuPotentielTotal(): float
 * - Elle doit parcourir TOUS les véhicules du parc (loués ou non) et cumuler leur tarif journalier respectif.
 * - Cette méthode doit mettre en évidence le concept de POLYMORPHISME.
 */

// Votre code POO ci-dessous :

class GestionnaireParc {

    // Attributs
    private array   $vehicules = [];

    /**
     * Ajoute un véhicule au tableau $vehicules
     * 
     * @param VehicleInterface $vehicule Récupère les valeurs indiqués à la création d'un véhicule
     */
    public function ajouterVehicule(VehiculeInterface $vehicule): void {
        array_push($this->vehicules, $vehicule);
    }

    /**
     * Tri les véhicules avec l'attribut $estDisponible à True, renvoie un tableau de ces véhicules
     * 
     * @return array $vehiculesDisponibles
     */
    public function getVehiculesDisponibles(): array {
        $vehiculesDisponibles = [];
        foreach ($this->vehicules as $vehicule) {
            if ($vehicule->estDisponible()) {
                $vehiculesDisponibles[] = $vehicule;
            }
        }
        return $vehiculesDisponibles;
    }

    /**
     * Calcul le revenu total potentiel de location de l'intégralité du parc automobile
     * 
     * @return float $revenuPotentielTotal
     */
    public function calculerRevenuPotentielTotal(): float {
        $revenuPotentielTotal = 0.0;
        foreach ($this->vehicules as $vehicule) {
            $revenuPotentielTotal += $vehicule->calculerTarifJournalier();
        }
        return $revenuPotentielTotal;
    }
}
?>