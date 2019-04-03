<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('countries')->insert(array(
  array('id' => '1','code' => 'AD','name' => 'Andorra','name_fr' => 'Andorre','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '2','code' => 'AE','name' => 'United Arab Emirates','name_fr' => 'Émirats arabes unis','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '3','code' => 'AF','name' => 'Afghanistan','name_fr' => 'Afghanistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '4','code' => 'AG','name' => 'Antigua and Barbuda','name_fr' => 'Antigua-et-Barbuda','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '5','code' => 'AI','name' => 'Anguilla','name_fr' => 'Anguilla','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '6','code' => 'AL','name' => 'Albania','name_fr' => 'Albanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '7','code' => 'AM','name' => 'Armenia','name_fr' => 'Arménie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '8','code' => 'AO','name' => 'Angola','name_fr' => 'Angola','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '9','code' => 'AQ','name' => 'Antarctica','name_fr' => 'Antarctique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '10','code' => 'AR','name' => 'Argentina','name_fr' => 'Argentine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '11','code' => 'AS','name' => 'American Samoa','name_fr' => 'Samoa américaine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '12','code' => 'AT','name' => 'Austria','name_fr' => 'Autriche','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '13','code' => 'AU','name' => 'Australia','name_fr' => 'Australie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '14','code' => 'AW','name' => 'Aruba','name_fr' => 'Aruba','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '15','code' => 'AX','name' => 'Åland Islands','name_fr' => 'Îles d\'Åland','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '16','code' => 'AZ','name' => 'Azerbaijan','name_fr' => 'Azerbaïdjan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '17','code' => 'BA','name' => 'Bosnia and Herzegovina','name_fr' => 'Bosnie-Herzégovine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '18','code' => 'BB','name' => 'Barbados','name_fr' => 'Barbade','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '19','code' => 'BD','name' => 'Bangladesh','name_fr' => 'Bangladesh','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '20','code' => 'BE','name' => 'Belgium','name_fr' => 'Belgique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '21','code' => 'BF','name' => 'Burkina Faso','name_fr' => 'Burkina Faso','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '22','code' => 'BG','name' => 'Bulgaria','name_fr' => 'Bulgarie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '23','code' => 'BH','name' => 'Bahrain','name_fr' => 'Bahreïn','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '24','code' => 'BI','name' => 'Burundi','name_fr' => 'Burundi','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '25','code' => 'BJ','name' => 'Benin','name_fr' => 'Bénin','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '26','code' => 'BL','name' => 'Saint Barthélemy','name_fr' => 'Saint-Barthélemy','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '27','code' => 'BM','name' => 'Bermuda','name_fr' => 'Bermudes','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '28','code' => 'BN','name' => 'Brunei Darussalam','name_fr' => 'Brunei Darussalam','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '29','code' => 'BO','name' => 'Bolivia','name_fr' => 'Bolivie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '30','code' => 'BQ','name' => 'Caribbean Netherlands','name_fr' => 'Pays-Bas caribéens','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '31','code' => 'BR','name' => 'Brazil','name_fr' => 'Brésil','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '32','code' => 'BS','name' => 'Bahamas','name_fr' => 'Bahamas','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '33','code' => 'BT','name' => 'Bhutan','name_fr' => 'Bhoutan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '34','code' => 'BV','name' => 'Bouvet Island','name_fr' => 'Île Bouvet','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '35','code' => 'BW','name' => 'Botswana','name_fr' => 'Botswana','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '36','code' => 'BY','name' => 'Belarus','name_fr' => 'Bélarus','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '37','code' => 'BZ','name' => 'Belize','name_fr' => 'Belize','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '38','code' => 'CA','name' => 'Canada','name_fr' => 'Canada','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '39','code' => 'CC','name' => 'Cocos (Keeling) Islands','name_fr' => 'Îles Cocos (Keeling)','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '40','code' => 'CD','name' => 'Congo, Democratic Republic of','name_fr' => 'Congo, République démocratique du','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '41','code' => 'CF','name' => 'Central African Republic','name_fr' => 'République centrafricaine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '42','code' => 'CG','name' => 'Congo','name_fr' => 'Congo','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '43','code' => 'CH','name' => 'Switzerland','name_fr' => 'Suisse','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '44','code' => 'CI','name' => 'Côte d\'Ivoire','name_fr' => 'Côte d\'Ivoire','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '45','code' => 'CK','name' => 'Cook Islands','name_fr' => 'Îles Cook','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '46','code' => 'CL','name' => 'Chile','name_fr' => 'Chili','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '47','code' => 'CM','name' => 'Cameroon','name_fr' => 'Cameroun','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '48','code' => 'CN','name' => 'China','name_fr' => 'Chine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '49','code' => 'CO','name' => 'Colombia','name_fr' => 'Colombie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '50','code' => 'CR','name' => 'Costa Rica','name_fr' => 'Costa Rica','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '51','code' => 'CU','name' => 'Cuba','name_fr' => 'Cuba','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '52','code' => 'CV','name' => 'Cape Verde','name_fr' => 'Cap-Vert','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '53','code' => 'CW','name' => 'Curaçao','name_fr' => 'Curaçao','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '54','code' => 'CX','name' => 'Christmas Island','name_fr' => 'Île Christmas','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '55','code' => 'CY','name' => 'Cyprus','name_fr' => 'Chypre','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '56','code' => 'CZ','name' => 'Czech Republic','name_fr' => 'République tchèque','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '57','code' => 'DE','name' => 'Germany','name_fr' => 'Allemagne','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '58','code' => 'DJ','name' => 'Djibouti','name_fr' => 'Djibouti','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '59','code' => 'DK','name' => 'Denmark','name_fr' => 'Danemark','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '60','code' => 'DM','name' => 'Dominica','name_fr' => 'Dominique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '61','code' => 'DO','name' => 'Dominican Republic','name_fr' => 'République dominicaine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '62','code' => 'DZ','name' => 'Algeria','name_fr' => 'Algérie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '63','code' => 'EC','name' => 'Ecuador','name_fr' => 'Équateur','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '64','code' => 'EE','name' => 'Estonia','name_fr' => 'Estonie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '65','code' => 'EG','name' => 'Egypt','name_fr' => 'Égypte','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '66','code' => 'EH','name' => 'Western Sahara','name_fr' => 'Sahara Occidental','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '67','code' => 'ER','name' => 'Eritrea','name_fr' => 'Érythrée','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '68','code' => 'ES','name' => 'Spain','name_fr' => 'Espagne','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '69','code' => 'ET','name' => 'Ethiopia','name_fr' => 'Éthiopie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '70','code' => 'FI','name' => 'Finland','name_fr' => 'Finlande','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '71','code' => 'FJ','name' => 'Fiji','name_fr' => 'Fidji','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '72','code' => 'FK','name' => 'Falkland Islands','name_fr' => 'Îles Malouines','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '73','code' => 'FM','name' => 'Micronesia, Federated States of','name_fr' => 'Micronésie, États fédérés de','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '74','code' => 'FO','name' => 'Faroe Islands','name_fr' => 'Îles Féroé','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '75','code' => 'FR','name' => 'France','name_fr' => 'France','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '76','code' => 'GA','name' => 'Gabon','name_fr' => 'Gabon','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '77','code' => 'GB','name' => 'United Kingdom','name_fr' => 'Royaume-Uni','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '78','code' => 'GD','name' => 'Grenada','name_fr' => 'Grenade','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '79','code' => 'GE','name' => 'Georgia','name_fr' => 'Géorgie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '80','code' => 'GF','name' => 'French Guiana','name_fr' => 'Guyane française','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '81','code' => 'GG','name' => 'Guernsey','name_fr' => 'Guernesey','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '82','code' => 'GH','name' => 'Ghana','name_fr' => 'Ghana','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '83','code' => 'GI','name' => 'Gibraltar','name_fr' => 'Gibraltar','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '84','code' => 'GL','name' => 'Greenland','name_fr' => 'Groenland','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '85','code' => 'GM','name' => 'Gambia','name_fr' => 'Gambie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '86','code' => 'GN','name' => 'Guinea','name_fr' => 'Guinée','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '87','code' => 'GP','name' => 'Guadeloupe','name_fr' => 'Guadeloupe','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '88','code' => 'GQ','name' => 'Equatorial Guinea','name_fr' => 'Guinée équatoriale','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '89','code' => 'GR','name' => 'Greece','name_fr' => 'Grèce','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '90','code' => 'GS','name' => 'South Georgia and the South Sandwich Islands','name_fr' => 'Géorgie du Sud et les îles Sandwich du Sud','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '91','code' => 'GT','name' => 'Guatemala','name_fr' => 'Guatemala','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '92','code' => 'GU','name' => 'Guam','name_fr' => 'Guam','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '93','code' => 'GW','name' => 'Guinea-Bissau','name_fr' => 'Guinée-Bissau','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '94','code' => 'GY','name' => 'Guyana','name_fr' => 'Guyana','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '95','code' => 'HK','name' => 'Hong Kong','name_fr' => 'Hong Kong','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '96','code' => 'HM','name' => 'Heard and McDonald Islands','name_fr' => 'Îles Heard et McDonald','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '97','code' => 'HN','name' => 'Honduras','name_fr' => 'Honduras','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '98','code' => 'HR','name' => 'Croatia','name_fr' => 'Croatie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '99','code' => 'HT','name' => 'Haiti','name_fr' => 'Haïti','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '100','code' => 'HU','name' => 'Hungary','name_fr' => 'Hongrie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '101','code' => 'ID','name' => 'Indonesia','name_fr' => 'Indonésie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '102','code' => 'IE','name' => 'Ireland','name_fr' => 'Irlande','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '103','code' => 'IL','name' => 'Israel','name_fr' => 'Israël','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '104','code' => 'IM','name' => 'Isle of Man','name_fr' => 'Île de Man','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '105','code' => 'IN','name' => 'India','name_fr' => 'Inde','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '106','code' => 'IO','name' => 'British Indian Ocean Territory','name_fr' => 'Territoire britannique de l\'océan Indien','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '107','code' => 'IQ','name' => 'Iraq','name_fr' => 'Irak','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '108','code' => 'IR','name' => 'Iran','name_fr' => 'Iran','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '109','code' => 'IS','name' => 'Iceland','name_fr' => 'Islande','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '110','code' => 'IT','name' => 'Italy','name_fr' => 'Italie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '111','code' => 'JE','name' => 'Jersey','name_fr' => 'Jersey','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '112','code' => 'JM','name' => 'Jamaica','name_fr' => 'Jamaïque','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '113','code' => 'JO','name' => 'Jordan','name_fr' => 'Jordanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '114','code' => 'JP','name' => 'Japan','name_fr' => 'Japon','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '115','code' => 'KE','name' => 'Kenya','name_fr' => 'Kenya','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '116','code' => 'KG','name' => 'Kyrgyzstan','name_fr' => 'Kirghizistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '117','code' => 'KH','name' => 'Cambodia','name_fr' => 'Cambodge','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '118','code' => 'KI','name' => 'Kiribati','name_fr' => 'Kiribati','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '119','code' => 'KM','name' => 'Comoros','name_fr' => 'Comores','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '120','code' => 'KN','name' => 'Saint Kitts and Nevis','name_fr' => 'Saint-Kitts-et-Nevis','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '121','code' => 'KP','name' => 'North Korea','name_fr' => 'Corée du Nord','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '122','code' => 'KR','name' => 'South Korea','name_fr' => 'Corée du Sud','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '123','code' => 'KW','name' => 'Kuwait','name_fr' => 'Koweït','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '124','code' => 'KY','name' => 'Cayman Islands','name_fr' => 'Îles Caïmans','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '125','code' => 'KZ','name' => 'Kazakhstan','name_fr' => 'Kazakhstan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '126','code' => 'LA','name' => 'Lao People\'s Democratic Republic','name_fr' => 'Laos','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '127','code' => 'LB','name' => 'Lebanon','name_fr' => 'Liban','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '128','code' => 'LC','name' => 'Saint Lucia','name_fr' => 'Sainte-Lucie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '129','code' => 'LI','name' => 'Liechtenstein','name_fr' => 'Liechtenstein','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '130','code' => 'LK','name' => 'Sri Lanka','name_fr' => 'Sri Lanka','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '131','code' => 'LR','name' => 'Liberia','name_fr' => 'Libéria','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '132','code' => 'LS','name' => 'Lesotho','name_fr' => 'Lesotho','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '133','code' => 'LT','name' => 'Lithuania','name_fr' => 'Lituanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '134','code' => 'LU','name' => 'Luxembourg','name_fr' => 'Luxembourg','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '135','code' => 'LV','name' => 'Latvia','name_fr' => 'Lettonie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '136','code' => 'LY','name' => 'Libya','name_fr' => 'Libye','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '137','code' => 'MA','name' => 'Morocco','name_fr' => 'Maroc','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '138','code' => 'MC','name' => 'Monaco','name_fr' => 'Monaco','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '139','code' => 'MD','name' => 'Moldova','name_fr' => 'Moldavie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '140','code' => 'ME','name' => 'Montenegro','name_fr' => 'Monténégro','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '141','code' => 'MF','name' => 'Saint-Martin (France)','name_fr' => 'Saint-Martin (France)','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '142','code' => 'MG','name' => 'Madagascar','name_fr' => 'Madagascar','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '143','code' => 'MH','name' => 'Marshall Islands','name_fr' => 'Îles Marshall','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '144','code' => 'MK','name' => 'Macedonia','name_fr' => 'Macédoine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '145','code' => 'ML','name' => 'Mali','name_fr' => 'Mali','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '146','code' => 'MM','name' => 'Myanmar','name_fr' => 'Myanmar','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '147','code' => 'MN','name' => 'Mongolia','name_fr' => 'Mongolie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '148','code' => 'MO','name' => 'Macau','name_fr' => 'Macao','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '149','code' => 'MP','name' => 'Northern Mariana Islands','name_fr' => 'Mariannes du Nord','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '150','code' => 'MQ','name' => 'Martinique','name_fr' => 'Martinique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '151','code' => 'MR','name' => 'Mauritania','name_fr' => 'Mauritanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '152','code' => 'MS','name' => 'Montserrat','name_fr' => 'Montserrat','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '153','code' => 'MT','name' => 'Malta','name_fr' => 'Malte','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '154','code' => 'MU','name' => 'Mauritius','name_fr' => 'Maurice','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '155','code' => 'MV','name' => 'Maldives','name_fr' => 'Maldives','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '156','code' => 'MW','name' => 'Malawi','name_fr' => 'Malawi','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '157','code' => 'MX','name' => 'Mexico','name_fr' => 'Mexique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '158','code' => 'MY','name' => 'Malaysia','name_fr' => 'Malaisie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '159','code' => 'MZ','name' => 'Mozambique','name_fr' => 'Mozambique','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '160','code' => 'NA','name' => 'Namibia','name_fr' => 'Namibie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '161','code' => 'NC','name' => 'New Caledonia','name_fr' => 'Nouvelle-Calédonie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '162','code' => 'NE','name' => 'Niger','name_fr' => 'Niger','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '163','code' => 'NF','name' => 'Norfolk Island','name_fr' => 'Île Norfolk','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '164','code' => 'NG','name' => 'Nigeria','name_fr' => 'Nigeria','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '165','code' => 'NI','name' => 'Nicaragua','name_fr' => 'Nicaragua','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '166','code' => 'NL','name' => 'The Netherlands','name_fr' => 'Pays-Bas','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '167','code' => 'NO','name' => 'Norway','name_fr' => 'Norvège','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '168','code' => 'NP','name' => 'Nepal','name_fr' => 'Népal','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '169','code' => 'NR','name' => 'Nauru','name_fr' => 'Nauru','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '170','code' => 'NU','name' => 'Niue','name_fr' => 'Niue','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '171','code' => 'NZ','name' => 'New Zealand','name_fr' => 'Nouvelle-Zélande','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '172','code' => 'OM','name' => 'Oman','name_fr' => 'Oman','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '173','code' => 'PA','name' => 'Panama','name_fr' => 'Panama','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '174','code' => 'PE','name' => 'Peru','name_fr' => 'Pérou','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '175','code' => 'PF','name' => 'French Polynesia','name_fr' => 'Polynésie française','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '176','code' => 'PG','name' => 'Papua New Guinea','name_fr' => 'Papouasie-Nouvelle-Guinée','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '177','code' => 'PH','name' => 'Philippines','name_fr' => 'Philippines','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '178','code' => 'PK','name' => 'Pakistan','name_fr' => 'Pakistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '179','code' => 'PL','name' => 'Poland','name_fr' => 'Pologne','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '180','code' => 'PM','name' => 'St. Pierre and Miquelon','name_fr' => 'Saint-Pierre-et-Miquelon','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '181','code' => 'PN','name' => 'Pitcairn','name_fr' => 'Pitcairn','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '182','code' => 'PR','name' => 'Puerto Rico','name_fr' => 'Puerto Rico','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '183','code' => 'PS','name' => 'Palestine, State of','name_fr' => 'Palestine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '184','code' => 'PT','name' => 'Portugal','name_fr' => 'Portugal','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '185','code' => 'PW','name' => 'Palau','name_fr' => 'Palau','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '186','code' => 'PY','name' => 'Paraguay','name_fr' => 'Paraguay','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '187','code' => 'QA','name' => 'Qatar','name_fr' => 'Qatar','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '188','code' => 'RE','name' => 'Réunion','name_fr' => 'Réunion','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '189','code' => 'RO','name' => 'Romania','name_fr' => 'Roumanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '190','code' => 'RS','name' => 'Serbia','name_fr' => 'Serbie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '191','code' => 'RU','name' => 'Russian Federation','name_fr' => 'Russie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '192','code' => 'RW','name' => 'Rwanda','name_fr' => 'Rwanda','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '193','code' => 'SA','name' => 'Saudi Arabia','name_fr' => 'Arabie saoudite','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '194','code' => 'SB','name' => 'Solomon Islands','name_fr' => 'Îles Salomon','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '195','code' => 'SC','name' => 'Seychelles','name_fr' => 'Seychelles','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '196','code' => 'SD','name' => 'Sudan','name_fr' => 'Soudan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '197','code' => 'SE','name' => 'Sweden','name_fr' => 'Suède','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '198','code' => 'SG','name' => 'Singapore','name_fr' => 'Singapour','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '199','code' => 'SH','name' => 'Saint Helena','name_fr' => 'Sainte-Hélène','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '200','code' => 'SI','name' => 'Slovenia','name_fr' => 'Slovénie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '201','code' => 'SJ','name' => 'Svalbard and Jan Mayen Islands','name_fr' => 'Svalbard et île de Jan Mayen','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '202','code' => 'SK','name' => 'Slovakia','name_fr' => 'Slovaquie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '203','code' => 'SL','name' => 'Sierra Leone','name_fr' => 'Sierra Leone','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '204','code' => 'SM','name' => 'San Marino','name_fr' => 'Saint-Marin','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '205','code' => 'SN','name' => 'Senegal','name_fr' => 'Sénégal','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '206','code' => 'SO','name' => 'Somalia','name_fr' => 'Somalie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '207','code' => 'SR','name' => 'Suriname','name_fr' => 'Suriname','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '208','code' => 'SS','name' => 'South Sudan','name_fr' => 'Soudan du Sud','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '209','code' => 'ST','name' => 'Sao Tome and Principe','name_fr' => 'Sao Tomé-et-Principe','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '210','code' => 'SV','name' => 'El Salvador','name_fr' => 'El Salvador','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '211','code' => 'SX','name' => 'Sint Maarten (Dutch part)','name_fr' => 'Saint-Martin (Pays-Bas)','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '212','code' => 'SY','name' => 'Syria','name_fr' => 'Syrie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '213','code' => 'SZ','name' => 'Swaziland','name_fr' => 'Swaziland','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '214','code' => 'TC','name' => 'Turks and Caicos Islands','name_fr' => 'Îles Turks et Caicos','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '215','code' => 'TD','name' => 'Chad','name_fr' => 'Tchad','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '216','code' => 'TF','name' => 'French Southern Territories','name_fr' => 'Terres australes françaises','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '217','code' => 'TG','name' => 'Togo','name_fr' => 'Togo','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '218','code' => 'TH','name' => 'Thailand','name_fr' => 'Thaïlande','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '219','code' => 'TJ','name' => 'Tajikistan','name_fr' => 'Tadjikistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '220','code' => 'TK','name' => 'Tokelau','name_fr' => 'Tokelau','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '221','code' => 'TL','name' => 'Timor-Leste','name_fr' => 'Timor-Leste','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '222','code' => 'TM','name' => 'Turkmenistan','name_fr' => 'Turkménistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '223','code' => 'TN','name' => 'Tunisia','name_fr' => 'Tunisie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '224','code' => 'TO','name' => 'Tonga','name_fr' => 'Tonga','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '225','code' => 'TR','name' => 'Turkey','name_fr' => 'Turquie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '226','code' => 'TT','name' => 'Trinidad and Tobago','name_fr' => 'Trinité-et-Tobago','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '227','code' => 'TV','name' => 'Tuvalu','name_fr' => 'Tuvalu','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '228','code' => 'TW','name' => 'Taiwan','name_fr' => 'Taïwan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '229','code' => 'TZ','name' => 'Tanzania','name_fr' => 'Tanzanie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '230','code' => 'UA','name' => 'Ukraine','name_fr' => 'Ukraine','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '231','code' => 'UG','name' => 'Uganda','name_fr' => 'Ouganda','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '232','code' => 'UM','name' => 'United States Minor Outlying Islands','name_fr' => 'Îles mineures éloignées des États-Unis','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '233','code' => 'US','name' => 'United States','name_fr' => 'États-Unis','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '234','code' => 'UY','name' => 'Uruguay','name_fr' => 'Uruguay','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '235','code' => 'UZ','name' => 'Uzbekistan','name_fr' => 'Ouzbékistan','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '236','code' => 'VA','name' => 'Vatican','name_fr' => 'Vatican','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '237','code' => 'VC','name' => 'Saint Vincent and the Grenadines','name_fr' => 'Saint-Vincent-et-les-Grenadines','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '238','code' => 'VE','name' => 'Venezuela','name_fr' => 'Venezuela','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '239','code' => 'VG','name' => 'Virgin Islands (British)','name_fr' => 'Îles Vierges britanniques','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '240','code' => 'VI','name' => 'Virgin Islands (U.S.)','name_fr' => 'Îles Vierges américaines','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '241','code' => 'VN','name' => 'Vietnam','name_fr' => 'Vietnam','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '242','code' => 'VU','name' => 'Vanuatu','name_fr' => 'Vanuatu','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '243','code' => 'WF','name' => 'Wallis and Futuna Islands','name_fr' => 'Îles Wallis-et-Futuna','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '244','code' => 'WS','name' => 'Samoa','name_fr' => 'Samoa','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '245','code' => 'YE','name' => 'Yemen','name_fr' => 'Yémen','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '246','code' => 'YT','name' => 'Mayotte','name_fr' => 'Mayotte','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '247','code' => 'ZA','name' => 'South Africa','name_fr' => 'Afrique du Sud','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '248','code' => 'ZM','name' => 'Zambia','name_fr' => 'Zambie','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '249','code' => 'ZW','name' => 'Zimbabwe','name_fr' => 'Zimbabwe','deleted_at' => NULL,'created_at' => NULL,'updated_at' => NULL)
)
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('countries');
    }
}
