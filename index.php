<?php
declare(strict_types=1);
require_once('gestionnaireParc.php');
require_once('VehiculeInterface.php');
require_once('vehicule.php');
require_once('voiture.php');
require_once('camion.php');

/**
 * CONSIGNES : Script d'exécution et de test
 * * 1. Incluez / requirez l'ensemble des fichiers nécessaires (Interface, Classes).
 * * 2. Instanciez un objet de la classe 'GestionnaireParc'.
 * * 3. Instanciez et ajoutez au gestionnaire au moins 3 véhicules :
 * - Une voiture de 3 portes (ex: prix de base 50€)
 * - Une voiture de 5 portes (ex: prix de base 60€)
 * - Un camion (ex: prix de base 100€, charge utile de 5.5 tonnes)
 * * 4. Simulez la location d'un véhicule de votre choix en changeant sa disponibilité à 'false'.
 * * 5. Affichez proprement (en texte brut ou HTML) :
 * - Le détail des véhicules actuellement disponibles dans le parc.
 * - Le revenu potentiel total généré par l'ensemble de la flotte sur une journée.
 */

// Votre script de test ci-dessous :
$gestionnaireParc = new GestionnaireParc();
$newVehicules = [];

$newVehicules[] = new Voiture('CH-242-GP', 'Mazda', 45.00, 3);
$newVehicules[] = new Voiture('DA-576-GV', 'Kia', 75.00, 5);
$newVehicules[] = new Camion('PL-035-KS', 'Scania', 110.00, 17.39);

$newVehicules[1]->setDisponibilite(false);

foreach ($newVehicules as $vehicule) {
    $gestionnaireParc->ajouterVehicule($vehicule);
}

/**
 * Organise l'affichage des données à l'utilisateur
 * 
 * @param GestionnaireParc $gestionnaireParc Instance du gestionnaire du parc automobile passée en paramètre
 */
function afficher(GestionnaireParc $gestionnaireParc): void {
    print(" <h1>Parc Automobile</h1>
            <h2>Véhicules Disponibles :</h2>");
    // Utilisation de la fonction native number_format() pour afficher une virgule à la place d'un point (affichage français), et 2 décimales après la virgule
    foreach ($gestionnaireParc->getVehiculesDisponibles() as $vehicule) {
        print("<p>".$vehicule->getMarque()." - Immatriculé : ".$vehicule->getImmatriculation()." - Tarif : ".number_format($vehicule->calculerTarifJournalier(), 2, ',')." €/j.</p>");
    }
    print("<h2>Revenu Total Potentiel :</h2>");
    print("<p>".number_format($gestionnaireParc->calculerRevenuPotentielTotal(), 2, ',')." €.</p>");
}

// Appel de la fonction afficher() avec l'attribut $gestionnaireParc
afficher($gestionnaireParc);
?>