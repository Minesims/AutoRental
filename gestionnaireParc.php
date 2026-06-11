<?php
require_once('VehiculeInterface.php');

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
?>