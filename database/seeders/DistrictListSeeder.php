<?php

namespace Database\Seeders;

use App\Models\CountryList;
use App\Models\DistrictList;
use App\Models\PostOfficeList;
use App\Models\ThanaList;
use Illuminate\Database\Seeder;

class DistrictListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bangladesh = CountryList::where(['name'=> 'Bangladesh', 'code'=> 'BD'])->first();
        $districts = [
            (object)[
                'name'=>'Barguna',
                'thana' => ['Amtali','Bamna','Barguna Sadar','Betagi','Patharghata','Taltali'],
                'post_office' =>['Amtali','Bamna','Barguna Sadar','Nali Bandar','Betagi','Darul Ulam','Kakchira','Patharghata'],
                'post_code' => ['8710','8730','8700','8701','8740','8741','8721','8720']
            ],
            (object)[
                'name'=> 'Barisal',
                'thana'=>['Agailzhara','Agailzhara','Babuganj','Barajalia','Barishal Sadar','Gouranadi','Mahendiganj','Muladi','Sahebganj','Uzirpur'],
                'post_office'=>['Agailzhara','Gaila','Paisarhat','Babuganj','Barishal Cadet','Chandpasha','Madhabpasha','Nizamuddin College','Rahamatpur','Thakur Mallik','Barajalia','Osman Manjil','Barishal Sadar','Bukhainagar','Jaguarhat','Kashipur','Patang','Saheberhat','Sugandia','Batajor','Gouranadi','Kashemabad','Tarki Bandar','Langutia','Laskarpur','Mahendiganj','Nalgora','Ulania','Charkalekhan','Kazirchar','Muladi','Charamandi','kalaskati','Padri Shibpur','Sahebganj','Shialguni','Dakuarhat','Dhamura','Jugirkanda','Shikarpur','Uzirpur'],
                'post_code' => ['8240','8241','8242','8210'
                    ,'8216','8212','8213','8215','8211','8214','8260','8261','8200','8201','8206','8205','8204','8202','8203','8233','8230','8232','8231','8274','8271','8270','8273','8272',
                    '8252','8251','8250','8281','8284','8282','8280','8283','8223','8221','8222','8224','8220']
            ],
            (object)[
                'name' => 'Bhola',
                'thana'=>['Bhola Sadar','Borhanuddin UPO','Charfashion','Doulatkhan','Doulatkhan','Hajirhat','Hatshoshiganj','Lalmohan UPO'],
                'post_office'=>['Bhola Sadar','Joynagar','Borhanuddin UPO','Mirzakalu','Charfashion','Dularhat','Keramatganj','Doulatkhan','Hajipur','Hajirhat','Hatshoshiganj','Daurihat','Gazaria','Lalmohan UPO'],
                'post_code'=>['8300','8301','8320','8321','8340','8341','8342','8310','8311','8360','8350','8331','8332','8330']
            ],
            (object)[
                'name'=> 'Jhalokati',
                'thana'=>['Jhalokathi Sadar','Kathalia','Nalchhiti','Rajapur'],
                'post_office'=>['Baukathi','Gabha','Jhalokathi Sadar','Nabagram','Shekherhat','Amua','Kathalia','Niamatee','Shoulajalia','Beerkathi','Nalchhiti','Rajapur'],
                'post_code'=>['8402','8403','8400','8401','8404','8431','8430','8432','8433','8421','8420','8410']
            ],
            (object)[
                'name' => 'Patuakhali',
                'thana'=>['Bauphal','Dashmina','Galachipa','Khepupara','Patuakhali Sadar','Subidkhali'],
                'post_office'=>['Bagabandar','Bauphal','Birpasha','Kalaia','Kalishari','Dashmina','Galachipa','Gazipur Bandar','Khepupara','Mahipur','Dumkee','Moukaran','Patuakhali Sadar','Rahimabad','Subidkhali'],
                'post_code'=>['8621','8620','8622','8624','8623','8630','8640','8641','8650','8651','8602','8601','8600','8603','8610']
            ],
            (object)[
                'name' => 'Pirojpur',
                'thana'=>['Banaripara','kaukhali','Mathbaria','Nazirpur','Pirojpur', 'Sadar','Swarupkathi'],
                'post_office'=>['Banaripara','Chakhar','Bhandaria','Dhaoa','Kanudashkathi','Jolagati','Joykul','Kaukhali','Keundia','Betmor Natun Hat','Gulishakhali','Halta','Mathbaria','Shilarganj','Tiarkhali', 'Tushkhali','Nazirpur','Sriramkathi','Hularhat','Parerhat','Pirojpur Sadar','Darus Sunnat','Jalabari','Kaurikhara','Swarupkathi'],
                'post_code'=>['8530','8531','8550','8552','8551','8513','8512','8510','8511','8565','8563','8562','8560','8566','8564','8561','8540','8541','8501','8502','8500','8521','8523','8522','8520']
            ],
            (object)[
                'name' => 'Bandarbant',
                'thana'=>['Alikadam','Bandarban Sadar','Naikhong','Roanchhari','Ruma','Thanchi','Thanchi'],
                'post_office'=>['Alikadam','Bandarban Sadar','Naikhong','Roanchhari','Ruma','Lama','Thanchi'],
                'post_code'=>['4650','4600','4660','4610','4620','4641','4630']
            ],
            (object)[
                'name'=> 'Brahmanbaria',
                'thana'=>['Akhaura','Akhaura','Banchharampur','Brahamanbaria Sadar','Kasba','Nabinagar','Nasirnagar','Sarail'],
                'post_office'=>['Akhaura','Azampur','Gangasagar','Banchharampur','Brahamanbaria Sadar','Talshahar','Ashuganj','Ashuganj Share','Poun','Kasba','Kuti','Chandidar','Chargachh','Gopinathpur','Nabinagar','Laubfatehpur','Rasullabad','Shamgram','Ratanpur','Shahapur','Kaitala','Salimganj','Jibanganj','Nasirnagar','Fandauk','Sarail','Shahbajpur','Chandura'],
                'post_code'=>['3450','3451','3452','3420','3400','3401','3402','3403','3404','3460','3461','3462','3463','3464','3410','3411','3412','3413','3414','3415','3417','3418','3419','3440','3441','3430','3431','3432']
            ],
            (object)[
                'name'=> 'Chandpur',
                'thana'=>['Chandpur Sadar','Faridganj','Hajiganj','Hayemchar','Kachua','Matlobganj','Shahrasti'],
                'post_office'=>['Baburhat','Chandpur Sadar','Puranbazar','Sahatali','Chandra','Faridganj','Gridkaliandia','Islampur Shah Isain','Rampurbazar','Rupsha','Bolakhal','Hajiganj','Gandamara','Hayemchar','Kachua','Pak Shrirampur','Rahima Nagar','Shachar','Kalipur','Matlobganj','Mohanpur','Chotoshi','Islamia Madrasha','Khilabazar','Pashchim Kherihar Al','Shahrasti'],
                'post_code'=>['3602','3600','3601','3603','3651','3650','3653','3655','3654','3652','3611','3610','3661','3660','3630','3631','3632','3633','3642','3640','3641','3623','3624','3621','3622','3620']
            ],
            (object)[
                'name'=>'Chattogram',
                'thana'=>['Anawara','Boalkhali','Chittagong Sadar','East Joara','Fatikchhari','Hathazari','Jaldi','Lohagara','Mirsharai','Patia Head Office','Rangunia','Rouzan','Sandwip','Satkania','Sitakunda'],
                'post_office'=>['Anowara','Battali','Paroikora','Boalkhali','Charandwip','Iqbal Park','Kadurkhal','Kanungopara','Sakpura','Saroatoli','Al- Amin Baria Madra','Amin Jute Mills','Anandabazar','Bayezid Bostami','Chandgaon','Chawkbazar','Chitt. Cantonment','Chitt. Customs Acca','Chitt. Politechnic In','Chitt. Sailers Colon','Chittagong Airport','Chittagong Bandar','Chittagong GPO','Export Processing','Firozshah','Halishahar','Halishshar','Jalalabad','Jaldia Merine Accade','Middle Patenga','Mohard','North Halishahar','North Katuli','Pahartoli','Patenga','Rampura TSO','Wazedia','Barma','Dohazari','East Joara','Gachbaria','Bhandar Sharif','Fatikchhari','Harualchhari','Najirhat','Nanupur','Narayanhat','Chitt.University','Fatahabad','Gorduara','Hathazari','Katirhat','Madrasa','Mirzapur','Nuralibari','Yunus Nagar','Banigram','Gunagari','Jaldi','Khan Bahadur','Chunti','Lohagara','Padua','Abutorab','Azampur','Bharawazhat','Darrogahat','Joarganj','Korerhat','Mirsharai','Mohazanhat','Budhpara','Patia Head Office','Dhamair','Rangunia','B.I.T Post Office','Beenajuri','Dewanpur','Fatepur','Gahira','Guzra Noapara','jagannath Hat','Kundeshwari','Mohamuni','Rouzan','Sandwip','Shiberhat','Urirchar','Baitul Ijjat','Bazalia','Satkania','Barabkunda','Baroidhala','Bawashbaria','Bhatiari','Fouzdarhat','Jafrabad','Kumira','Sitakunda'],
                'post_code'=>['4376','4378','4377','4366','4369','4365','4368','4363','4367','4364','4221','4211','4215','4210','4212','4203','4220','4219','4209','4218','4205','4100','4000','4223','4207','4216','4225','4214','4206','4222','4208','4226','4217','4202','4204','4224','4213','4383','4382','4380','4381','4352','4350','4354','4353','4351','4355','4331','4335','4332','4330','4333','4339','4334','4337','4338','4393','4392','4390','4391','4398','4396','4397','4321','4325','4323','4322','4324','4327','4320','4328','4371','4370','4361','4360','4349','4341','4347','4345','4343','4346','4344','4342','4348','4340','4300','4301','4302','4387','4388','4386','4312','4311','4313','4315','4316','4317','4314','4310']
            ],
            (object)[
                'name'=>'Comilla',
                'thana'=>['Barura','Brahmanpara','Burichang','Chandina','Chouddagram','Comilla Sadar','Daudkandi','Davidhar','Homna','Laksam','Langalkot','Muradnagar'],
                'post_office'=>['Barura','Murdafarganj','Poyalgachha','Brahmanpara','Burichang','Maynamoti bazar','Chandia','Madhaiabazar','Batisa','Chiora','Chouddagram','Comilla Contoment','Comilla Sadar','Courtbari','Halimanagar','Suaganj','Dashpara','Daudkandi','Eliotganj','Gouripur','Barashalghar','Davidhar','Dhamtee','Gangamandal','Homna','Bipulasar','Laksam','Lakshamanpur','Chhariabazar','Dhalua','Gunabati','Langalkot','Bangra','Companyganj','Muradnagar','Pantibazar','Ramchandarpur','Sonakanda'],
                'post_code'=>['3560','3562','3561','3526','3520','3521','3510','3511','3551','3552','3550','3501','3500','3503','3502','3504','3518','3516','3519','3517','3532','3530','3533','3531','3546', '3572','3570','3571','3582','3581','3583','3580','3543','3542','3540','3545','3541','3544']
            ],
            (object)[
                'name'=>'Cox\'sBazar',
                'thana'=>['Chiringga','Cox\'s Bazar Sadar','Gorakghat','Kutubdia','Ramu','Teknaf','Ukhia'],
                'post_office'=>['Badarkali','Chiringga','Chiringga S.O','Malumghat','Coxs Bazar Sadar','Eidga','Zhilanja','Gorakghat','Kutubdia','Ramu','Hnila','St.Martin','Teknaf','Ukhia'],
                'post_code'=>['4742','4740','4741','4743','4700','4702','4701','4710','4720','4730','4761','4762','4760','4750']
            ],
            (object)[
                'name'=>'Feni',
                'thana'=>['Chhagalnaia','Dagonbhuia','Feni Sadar','Pashurampur','Sonagazi'],
                'post_office'=>['Chhagalnaia','Daraga Hat','Maharajganj','Puabashimulia','Chhilonia','Dagondhuia','Dudmukha','Rajapur','Fazilpur','Feni Sadar','Laskarhat','Sharshadie','Fulgazi','Munshirhat','Pashurampur','Shuarbazar','Ahmadpur','Kazirhat','Motiganj','Sonagazi'],
                'post_code'=>['3910','3912','3911','3913','3922','3920','3921','3923','3901','3900','3903','3902','3942','3943','3940','3941','3932','3933','3931','3930']
            ],
            (object)[
                'name'=> 'Khagrachhari',
                'thana'=>['Diginala','Khagrachhari Sadar','Laxmichhari','Mahalchhari','Manikchhari','Matiranga','Panchhari','Ramghar Head Office'],
                'post_office'=>['Diginala','Khagrachhari Sadar','Laxmichhari','Mahalchhari','Manikchhari','Matiranga','Panchhari','Ramghar Head Office'],
                'post_code'=>['4420','4400','4470','4430','4460','4450','4410','4440']
            ],
            (object)[
                'name'=>'Lakshmipur',
                'thana'=>['Char Alexgander','Lakshimpur Sadar','Ramganj','Raypur'],
                'post_office'=>['Char Alexgander','Hajirghat','Ramgatirhat','Amani Lakshimpur','Bhabaniganj','Chandraganj','Choupalli','Dalal Bazar','Duttapara','Keramatganj','Lakshimpur Sadar','Mandari','Rupchara','Alipur','Dolta','Kanchanpur','Naagmud','Panpara','Ramganj','Bhuabari','Haydarganj','Nagerdighirpar','Rakhallia','Raypur'],
                'post_code'=>['3730','3731','3732','3709','3702','3708','3707','3701','3706','3704','3700','3703','3705','3721','3725','3723','3724','3722','3720','3714','3713','3712','3711','3710']
            ],
            (object)[
                'name' =>'Noakhali',
                'thana'=>['Basurhat','Begumganj','Chatkhil','Hatiya','Noakhali Sadar','Senbag'],
                'post_office'=>['Basur Hat','Charhajari','Alaiarpur','Amisha Para','Banglabazar','Bazra','Begumganj','Bhabani Jibanpur','Choumohani','Dauti','Durgapur','Gopalpur','Jamidar Hat','Joyag','Joynarayanpur','Khalafat Bazar','Khalishpur','Maheshganj','Mir Owarishpur','Nadona','Nandiapara','Oachhekpur','Rajganj','Sonaimuri','Tangirpar','Thanar Hat','Bansa Bazar','Bodalcourt','Chatkhil','Dosh Gharia','Karihati','Khilpara','Palla','Rezzakpur','Sahapur','Sampara','Shingbahura','Solla','Afazia','Hatiya','Tamoraddi','Chaprashir Hat','Char Jabbar','Charam Tua','Din Monir Hat','Kabirhat','Khalifar Hat','Mriddarhat','Noakhali College','Noakhali Sadar','Pak Kishoreganj','Sonapur','Beezbag','Chatarpaia','Kallyandi','Kankirhat','Senbag','T.P. Lamua'],
                'post_code'=>['3850','3851','3831','3847','3822','3824','3820','3837','3821','3843','3848','3828','3825','3844','3829','3833','3842','3838','3823','3839','3841','3835','3834','3827','3832','3845','3879','3873','3870','3878','3877','3872','3871','3874','3881','3882','3883','3875','3891','3890','3892','3811','3812','3809','3803','3807','3808','3806','3801','3800','3804','3802','3862','3864','3861','3863','3860','3865']
            ],
            (object)[
                'name'=>'Rangamati',
                'thana'=>['Barakal','Bilaichhari','Jarachhari','Kalampati','kaptai','Longachh','Marishya','Naniachhar','Rajsthali','Rangamati Sadar'],
                'post_office'=>['Barakal','Bilaichhari','Jarachhari','Betbunia','Kalampati','Chandraghona','Kaptai','Kaptai Nuton Bazar','Kaptai Project','Longachh','Marishya','Nanichhar','Rajsthali','Rangamati Sadar'],
                'post_code'=>['4570','4550','4560','4511','4510','4531','4530','4533','4532','4580','4590','4520','4540','4500']
            ],
            (object)[
                'name' => 'Dhaka',
                'thana'=>['Demra','Dhaka Cantt.','Dhamrai','Dhanmondi','Gulshan','Jatrabari','Joypara','Keraniganj','Khilgaon','Khilkhet','Lalbag','Mirpur','Mohammadpur','Motijheel','Nawabganj','New market','Palton','Ramna','Sabujbag','Savar','Sutrapur','Tejgaon','Tejgaon Industrial Area','Uttara'],
                'post_office'=>['Demra','Matuail','Sarulia','Dhaka CantonmentTSO','Dhamrai','Kamalpur','Jigatala TSO','Banani TSO','Gulshan Model Town','Dhania TSO','Joypara','Narisha','Palamganj','Ati','Dhaka Jute Mills','Kalatia','Keraniganj','KhilgaonTSO','KhilkhetTSO','Posta TSO','Mirpur TSO','Mohammadpur Housing','Sangsad BhabanTSO','BangabhabanTSO','DilkushaTSO','Agla','Churain','Daudpur','Hasnabad','Khalpar','Nawabganj','New Market TSO','Dhaka GPO','Shantinagr TSO','Basabo TSO','Amin Bazar','Dairy Farm','EPZ','Jahangirnagar Univer','Kashem Cotton Mills','Rajfhulbaria','Savar','Savar Canttonment','Saver P.A.T.C','Shimulia','Dhaka Sadar HO','Gendaria TSO','Wari TSO','Tejgaon TSO','Dhaka Politechnic','Uttara Model TwonTSO'],
                'post_code'=>['1360','1362','1361','1206','1350','1351','1209','1213','1212','1232','1330','1332','1331','1312','1311','1313','1310','1219','1229','1211','1216','1207','1225','1222','1223','1323','1325','1322','1321','1324','1320','1205','1000','1217','1214','1348','1341','1349','1342','1346','1347','1340','1344','1343','1345','1100','1204','1203','1215','1208','1230']
            ],
            (object)[
                'name'=>'Faridpur',
                'thana'=>['Alfadanga','Bhanga','Boalmari','Charbhadrasan','Faridpur Sadar','Madukhali','Nagarkanda','Sadarpur','Shriangan'],
                'post_office'=>['Alfadanga','Bhanga','Boalmari','Rupatpat','Charbadrashan','Ambikapur','Baitulaman Politecni','Faridpur Sadar','Kanaipur','Kamarkali','Madukhali','Nagarkanda','Talma',
                    'Bishwa jaker Manjil','Hat Krishapur','Sadarpur','Shriangan'],
                'post_code'=>['7870','7830','7860','7861','7810','7802','7803','7800','7801','7851','7850','7840','7841','7822','7821','7820','7804']
            ],
            (object)[
                'name' => 'Gazipur',
                'thana'=>['Gazipur Sadar','Kaliakaar','Kaliganj','Kapashia','Monnunagar','Sreepur','Sripur'],
                'post_office'=>['B.O.F','B.R.R','Chandna','Gazipur Sadar','National University','Kaliakaar','Safipur','Kaliganj','Pubail','Santanpara','Vaoal Jamalpur','kapashia','Ershad Nagar','Monnunagar','Nishat Nagar','Barmi','Bashamur','Boubi','Kawraid','Satkhamair','Sreepur','Rajendrapur','Rajendrapur Canttome'],
                'post_code'=>['1703','1701','1702','1700','1704','1750','1751','1720','1721','1722','1723','1730','1712','1710','1711','1743','1747','1748','1745','1744','1740','1741','1742']
            ],
            (object)[
                'name'=>'Gopalganj',
                'thana'=>['Gopalganj Sadar','Kashiani','Kotalipara','Maksudpur','Tungipara'],
                'post_office'=>['Barfa','Chandradighalia','Gopalganj Sadar','Ulpur','Jonapur','Kashiani','Ramdia College','Ratoil','Kotalipara','Batkiamari','Khandarpara','Maksudpur','Patgati','Tungipara'],
                'post_code'=>['8102','8013','8100','8101','8133','8130','8131','8132','8110','8141','8142','8140','8121','8120']
            ],
            (object)[
                'name'=>'Kishoreganj',
                'thana'=>['Bajitpur','Bhairob','Hossenpur','Itna','Karimganj','Katiadi','Kishoreganj Sadar','Kuliarchar','Mithamoin','Nikli','Ostagram','Pakundia','Tarial'],
                'post_office'=>['Bajitpur','Laksmipur','Sararchar','Bhairab','Hossenpur','Itna','Karimganj','Gochhihata','Katiadi','Kishoreganj S.Mills','Kishoreganj Sadar','Maizhati','Nilganj','Chhoysuti','Kuliarchar','Abdullahpur','MIthamoin','Nikli','Ostagram','Pakundia','Tarial'],
                'post_code'=>['2336','2338','2337','2350','2320','2390','2310','2331','2330','2301','2300','2302','2303','2341','2340','2371','2370','2360','2380','2326','2316']
            ],
            (object)[
                'name'=>'Madaripur',
                'thana'=>['Barhamganj','kalkini','Madaripur Sadar','Rajoir'],
                'post_office'=>['Bahadurpur','Barhamganj','Nilaksmibandar','Umedpur','Kalkini','Sahabrampur','Charmugria','Habiganj','Kulpaddi','Madaripur Sadar','Mustafapur','Khalia','Rajoir'],
                'post_code'=>['7932','7930','7931','7933','7920','7921','7901','7903','7902','7900','7904','7911','7910']
            ],
            (object)[
                'name'=>'Manikganj',
                'thana'=>['Doulatpur','Gheor','Lechhraganj','Manikganj Sadar','Saturia','Shibloya','Singari'],
                'post_office'=>['Doulatpur','Gheor','Jhitka','Lechhraganj','Barangail','Gorpara','Mahadebpur','Manikganj Bazar','Manikganj Sadar','Baliati','Saturia','Aricha','Shibaloy','Tewta','Uthli','Baira','joymantop','Singair'],
                'post_code'=>['1860','1840','1831','1830','1804','1802','1803','1801','1800','1811','1810','1851','1850','1852','1853','1821','1822','1820']
            ],
            (object)[
                'name'=>'Kishoreganj',
                'thana'=>['Gajaria','Lohajong','Munshiganj Sadar','Sirajdikhan','Srinagar','Tangibari'],
                'post_office'=>['Gajaria','Hossendi','Rasulpur','Gouragonj','Gouragonj','Haldia SO','Haridia','Haridia DESO','Korhati','Lohajang','Madini Mandal','Medini Mandal EDSO','Kathakhali','Mirkadim','Munshiganj Sadar','Rikabibazar','Ichapur','Kola','Malkha Nagar','Shekher Nagar','Sirajdikhan','Baghra','Barikhal','Bhaggyakul','Hashara','Kolapara','Kumarbhog','Mazpara','Srinagar','Vaggyakul SO','Bajrajugini','Baligao','Betkahat','Dighirpar','Hasail','Pura','Pura EDSO','Tangibari'],
                'post_code'=>['1510','1511','1512','1334','1534','1532','1333','1533','1531','1530','1335','1535','1503','1502','1500','1501','1542','1541','1543','1544','1540','1557','1551','1558','1553','1554','1555','1552','1550','1556','1523','1522','1521','1525','1524','1527','1526','1520']
            ],
            (object)[
                'name'=>'Narayanganj',
                'thana'=>['Araihazar','Baidder Bazar','Bandar','Fatullah','Narayanganj Sadar','Rupganj','Siddirganj'],
                'post_office'=>['Araihazar','Gopaldi','Baidder Bazar','Bara Nagar','Barodi','Bandar','BIDS','D.C Mills','Madanganj','Nabiganj','Fatulla Bazar','Fatullah','Narayanganj Sadar','Bhulta','Kanchan','Murapara','Nagri','Rupganj','Adamjeenagar','LN Mills','Siddirganj'],
                'post_code'=>['1450','1451','1440','1441','1442','1410','1413','1411','1414','1412','1421','1420','1400','1462','1461','1464','1463','1460','1431','1432','1430']
            ],
            (object)[
                'name'=>'Narsingdi',
                'thana'=>['Belabo','Monohordi','Narsingdi Sadar','Palash','Raypura','Shibpur'],
                'post_office'=>['Belabo','Hatirdia','Katabaria','Monohordi','Karimpur','Madhabdi','Narsingdi College','Narsingdi Sadar','Panchdona','UMC Jute Mills','Char Sindhur','Ghorashal','Ghorashal Urea Facto','Palash','Bazar Hasnabad','Radhaganj bazar','Raypura','Shibpur'],
                'post_code'=>['1640','1651','1652','1650','1605','1604','1602','1600','1603','1601','1612','1613','1611','1610','1631','1632','1630','1620']
            ],
            (object)[
                'name'=>'Rajbari',
                'thana'=>['Baliakandi','Pangsha','Rajbari Sadar'],
                'post_office'=>['Baliakandi','Nalia','Mrigibazar','Pangsha','Ramkol','Ratandia','Goalanda','Khankhanapur','Rajbari Sadar'],
                'post_code'=>['7730','7731','7723','7720','7721','7722','7710','7711','7700']
            ],
            (object)[
                'name'=>'Shariatpur',
                'thana'=>['Bhedorganj','Damudhya','Gosairhat','Jajira','Naria','Shariatpur Sadar'],
                'post_office'=>['Bhedorganj','Damudhya','Gosairhat','Jajira','Bhozeshwar','Gharisar','Kartikpur','Naria','Upshi','Angaria','Chikandi','Shariatpur Sadar'],
                'post_code'=>['8030','8040','8050','8010','8021','8022','8024','8020','8023','8001','8002','8000']
            ],
            (object)[
                'name'=>'Tangail',
                'thana'=>['Basail','Bhuapur','Delduar','Ghatail','Gopalpur','Kashkaolia','Madhupur','Mirzapur','Nagarpur','Sakhipur','Tangail Sadar'],
                'post_office'=>['Basail','Bhuapur','Delduar','Elasin','Hinga Nagar','Jangalia','Lowhati','Patharail','D. Pakutia','Dhalapara','Ghatial','Lohani','Zahidganj','Gopalpur','Hemnagar','Jhowail','Ballabazar','Elinga','Kalihati','Nagarbari','Nagarbari SO','Nagbari','Palisha','Rajafair','Kashkawlia','Dhobari','Madhupur','Gorai','Jarmuki','M.C. College','Mirzapur','Mohera','Warri paikpara','Dhuburia','Nagarpur','Salimabad','Kochua','Sakhipur','Kagmari','Korotia','Purabari','Santosh','Tangail Sadar'],
                'post_code'=>['1920','1960','1910','1913','1914','1911','1915','1912','1982','1983','1980','1984','1981','1990','1992','1991','1973','1974','1970','1977','1976','1972','1975','1971','1930','1997','1996','1941','1944','1942','1940','1945','1943','1937','1936','1938','1951','1950','1901','1903','1904','1902','1900']
            ],
            (object)[
                'name'=>'Bagerhat',
                'thana'=>['Bagerhat Sadar','Chalna Ankorage','Chitalmari','Fakirhat','Kachua UPO','Mollahat','Morelganj','Rampal','Rayenda'],
                'post_office'=>['Bagerhat Sadar','P.C College','Rangdia','Chalna Ankorage','Mongla Port','Barabaria','Chitalmari','Bhanganpar Bazar','Fakirhat','Mansa','Kachua','Sonarkola','Charkulia','Dariala','Kahalpur','Mollahat','Nagarkandi','Pak Gangni','Morelganj','Sannasi Bazar','Telisatee','Foylahat','Gourambha','Rampal','Sonatunia','Rayenda'],
                'post_code'=>['9300','9301','9302','9350','9351','9361','9360','9372','9370','9371','9310','9311','9383','9382','9381','9380','9384','9385','9320','9321','9322','9341','9343','9340','9342','9330']
            ],
            (object)[
                'name'=>'Chuadanga',
                'thana'=>['Alamdanga','Chuadanga Sadar','Damurhuda','Doulatganj'],
                'post_office'=>['Alamdanga','Hardi','Chuadanga Sadar','Munshiganj','Andulbaria','Damurhuda','Darshana','Doulatganj'],
                'post_code'=>['7210','7211','7200','7201','7222','7220','7221','7230']
            ],
            (object)[
                'name'=>'Jessore',
                'thana'=>['Bagharpara','Chaugachha','Jessore Sadar','Jhikargachha','Keshabpur','Monirampur','Noapara','Sarsa'],
                'post_office'=>['Bagharpara','Gouranagar','Chougachha','Basundia','Chanchra','Churamankathi','Jessore Airbach','Jessore canttonment','Jessore Sadar','Jessore Upa-Shahar','Rupdia','Jhikargachha','Keshobpur','Monirampur','Bhugilhat','Noapara','Rajghat','Bag Achra','Benapole','Jadabpur','Sarsa'],
                'post_code'=>['7470','7471','7410','7406','7402','7407','7404','7403','7400','7401','7405','7420','7450','7440','7462','7460','7461','7433','7431','7432','7430']
            ],
            (object)[
                'name'=>'Jhenaidah',
                'thana'=>['Harinakundu','Jhenaidah Sadar','Kotchandpur','Maheshpur','Naldanga','Shailakupa'],
                'post_office'=>['Harinakundu','Jhenaidah Cadet College','Jhenaidah Sadar','Kotchandpur','Maheshpur','Hatbar Bazar','Naldanga','Kumiradaha','Shailakupa'],
                'post_code'=>['7310','7301','7300','7330','7340','7351','7350','7321','7320']
            ],
            (object)[
                'name'=>'Khulna',
                'thana'=>['Alaipur','Batiaghat','Chalna Bazar','Digalia','Khulna Sadar','Madinabad','Paikgachha','Phultala','Sajiara','Terakhada'],
                'post_office'=>['Alaipur','Belphulia','Rupsha','Batiaghat','Surkalee','Bajua','Chalna Bazar','Dakup','Nalian','Chandni Mahal','Digalia','Gazirhat','Ghoshghati','Senhati','Atra Shilpa Area','BIT Khulna','Doulatpur','Jahanabad Canttonmen','Khula Sadar','Khulna G.P.O','Khulna Shipyard','Khulna University','Siramani','Sonali Jute Mills','Amadee','Madinabad','Chandkhali','Garaikhali','Godaipur','Kapilmoni','Katipara','Paikgachha','Phultala','Chuknagar','Ghonabanda','Sajiara','Shahapur','Pak Barasat','Terakhada'],
                'post_code'=>['9240','9242','9241','9260','9261','9272','9270','9271','9273','9221','9220','9224','9223','9222','9207','9203','9202','9205','9100','9000','9201','9208','9204','9206','9291','9290','9284','9285','9281','9282','9283','9280','9210','9252','9251','9250','9253','9231','9230']
            ],
            (object)[
                'name'=>'Kushtia',
                'thana'=>['Bheramara','Janipur','Kumarkhali','Kushtia Sadar','Mirpur','Rafayetpur'],
                'post_office'=>['Allardarga','Bheramara','Ganges Bheramara','Janipur','Khoksa','Kumarkhali','Panti','Islami University','Jagati','Kushtia Mohini','Kushtia Sadar','Amla Sadarpur','Mirpur','Poradaha','Khasmathurapur','Rafayetpur','Taragunia'],
                'post_code'=>['7042','7040','7041','7020','7021','7010','7011','7003','7002','7001','7000','7032','7030','7031','7052','7050','7051']
            ],
            (object)[
                'name'=>'Magura',
                'thana'=>['Arpara','Magura Sadar','Mohammadpur','Shripur'],
                'post_office'=>['Arpara','Magura Sadar','Binodpur','Mohammadpur','Nahata','Langalbadh','Nachol','Shripur'],
                'post_code'=>['7620','7600','7631','7630','7632','7611','7612','7610']
            ],
            (object)[
                'name'=>'Meherpur',
                'thana'=>['Gangni','Meherpur Sadar'],
                'post_office'=>['Gangni','Amjhupi','Amjhupi','Meherpur Sadar','Mujib Nagar Complex'],
                'post_code'=>['7110','7101','7152','7100','7102']
            ],
            (object)[
                'name'=>'Narail',
                'thana'=>['Kalia','Laxmipasha','Mohajan','Narail Sadar'],
                'post_office'=>['Kalia','Baradia','Itna','Laxmipasha','Lohagora','Naldi','Mohajan','Narail Sadar','Ratanganj'],
                'post_code'=>['7520','7514','7512','7510','7511','7513','7521','7500','7501']
            ],
            (object)[
                'name'=>'Satkhira',
                'thana'=>['Ashashuni','Debbhata','Kalaroa','Kaliganj UPO','Nakipur','Satkhira Sadar','Taala'],
                'post_office'=>['Ashashuni','Baradal','Debbhata','Gurugram','Chandanpur','Hamidpur','Jhaudanga','kalaroa','Khordo','Murarikati','Kaliganj UPO','Nalta Mubaroknagar','Ratanpur','Buri Goalini','Gabura','Habinagar','Nakipur','Naobeki','Noornagar','Budhhat','Gunakar kati','Satkhira Islamia Acc','Satkhira Sadar','Patkelghata','Taala'],
                'post_code'=>['9460','9461','9430','9431','9415','9413','9412','9410','9414','9411','9440','9441','9442','9453','9454','9455','9450','9452','9451','9403','9402','9401','9400','9421','9420']
            ],
            (object)[
                'name'=>'Jamalpur',
                'thana'=>['Dewangonj','Islampur','Jamalpur','Malandah','Mathargonj','Shorishabari'],
                'post_office'=>['Dewangonj','Dewangonj S. Mills','Durmoot','Gilabari','Islampur','Jamalpur','Nandina','Narundi','Jamalpur','Mahmoodpur','Malancha','Malandah','Balijhuri','Mathargonj','Bausee','Gunerbari','Jagannath Ghat','Jamuna Sar Karkhana','Pingna','Shorishabari'],
                'post_code'=>['2030','2031','2021','2022','2020','2000','2001','2002','2011','2013','2012','2010','2041','2040','2052','2051','2053','2055','2054','2050']
            ],
            (object)[
                'name'=>'Mymensingh',
                'thana'=>['Bhaluka','Fulbaria','Gaforgaon','Gouripur','Haluaghat','Isshwargonj','Muktagachh','Mymensingh Sadar','Nandail','Phulpur','Trishal'],
                'post_office'=>['Bhaluka','Fulbaria','Duttarbazar','Gaforgaon','Kandipara','Shibganj','Usti','Gouripur','Ramgopalpur','Dhara','Haluaghat','Munshirhat','Atharabari'
                    ,'Isshwargonj','Sohagi','Muktagachha','Agriculture University','Biddyaganj','Kawatkhali','Mymensingh Sadar','Pearpur','Shombhuganj','Gangail','Nandail'
                    ,'Beltia','Phulpur','Tarakanda','Ahmadbad','Dhala','Ram Amritaganj','Trishal'],
                'post_code'=>['2240','2216','2234','2230','2233','2231','2232','2270','2271','2261','2260','2262','2282','2280','2281','2210','2202','2204','2201'
                    ,'2200','2205','2203','2291','2290','2251','2250','2252','2221','2223','2222','2220']
            ],
            (object)[
                'name'=>'Netrokona',
                'thana'=>['Susung Durgapur','Atpara','Barhatta','Dharmapasha','Dhobaura','Kalmakanda','Kendua','Khaliajuri','Madan','Moddhynagar','Mohanganj','Netrokona Sadar','Purbadhola','Susung Durgapur','Atpara','Barhatta','Dharmapasha','Dhobaura','Kalmakanda','Kendua','Khaliajuri','Madan','Moddhynagar','Mohanganj','Netrokona Sadar'],
                'post_office'=>['Susnng Durgapur','Atpara','Barhatta','Dharampasha','Dhobaura','Sakoai','Kalmakanda','Kendua','Khaliajhri','Shaldigha','Madan','Moddoynagar','Mohanganj','Baikherhati','Netrokona Sadar','Jaria Jhanjhail','Purbadhola','Shamgonj','Susnng Durgapur','Atpara','Barhatta','Dharampasha','Dhobaura','Sakoai','Kalmakanda','Kendua','Khaliajhri','Shaldigha','Madan','Moddoynagar','Mohanganj','Baikherhati','Netrokona Sadar'],
                'post_code'=>['2420','2470','2440','2450','2416','2417','2430','2480','2460','2462','2490','2456','2446','2401','2400','2412','2410','2411','2420','2470','2440','2450','2416','2417','2430','2480','2460','2462','2490','2456','2446','2401','2400']
            ],
            (object)[
                'name'=>'Sherpur',
                'thana'=>['Bakshigonj','Jhinaigati','Nakla','Nalitabari','Sherpur Shadar','Shribardi'],
                'post_office'=>['Bakshigonj','Jhinaigati','Gonopaddi','Nakla','Hatibandha','Nalitabari','Sherpur Shadar','Shribardi'],
                'post_code'=>['2140','2120','2151','2150','2111','2110','2100','2130']
            ],
            (object)[
                'name'=>'Bogura',
                'thana'=>['Alamdighi','Bogra Sadar','Dhunat','Dupchachia','Gabtoli','Kahalu','Nandigram','Sariakandi','Sherpur','Shibganj','Sonatola'],
                'post_office'=>['Adamdighi','Nasharatpur','Santahar','Bogra Canttonment','Bogra Sadar','Dhunat','Gosaibari','Dupchachia','Talora','Gabtoli','Sukhanpukur','Kahalu','Nandigram','Chandan Baisha','Sariakandi','Chandaikona','Palli Unnyan Accadem','Sherpur','Shibganj','Sonatola'],
                'post_code'=>['5890','5892','5891','5801','5800','5850','5851','5880','5881','5820','5821','5870','5860','5831','5830','5841','5842','5840','5810','5826']
            ],
            (object)[
                'name'=>'Joypurhat',
                'thana'=>['Akkelpur','Joypurhat Sadar','kalai','Khetlal','panchbibi'],
                'post_office'=>['Akklepur','jamalganj','Tilakpur','Joypurhat Sadar','kalai','Khetlal','Panchbibi'],
                'post_code'=>['5940','5941','5942','5900','5930','5920','5910']
            ],
            (object)[
                'name'=>'Naogaon',
                'thana'=>['Ahsanganj','Badalgachhi','Dhamuirhat','Mahadebpur','Naogaon Sadar','Niamatpur','Nitpur','Patnitala','Prasadpur','Raninagar','Sapahar'],
                'post_office'=>['Ahsanganj','Bandai','Badalgachhi','Dhamuirhat','Mahadebpur','Naogaon Sadar','Niamatpur','Nitpur','Panguria','Porsa','Patnitala','Balihar','Manda','Prasadpur','Kashimpur','Raninagar','Moduhil','Sapahar'],
                'post_code'=>['6596','6597','6570','6580','6530','6500','6520','6550','6552','6551','6540','6512','6511','6510','6591','6590','6561','6560']
            ],
            (object)[
                'name'=>'Natore',
                'thana'=>['Gopalpur UPO','Harua','Hatgurudaspur','Laxman','Natore Sadar','Singra'],
                'post_office'=>['Abdulpur','Gopalpur U.P.O','Lalpur S.O','Baraigram','Dayarampur','Harua','Hatgurudaspur','Laxman','Baiddyabal Gharia','Digapatia','Madhnagar','Natore Sadar','Singra'],
                'post_code'=>['6422','6420','6421','6432','6431','6430','6440','6410','6402','6401','6403','6400','6450']
            ],
            (object)[
                'name'=>'Chapainawabganj',
                'thana'=>['Bholahat','Chapinawabganj Sadar','Nachol','Rohanpur','Shibganj U.P.O'],
                'post_office'=>['Bholahat','Amnura','Chapinawbganj Sadar','Rajarampur','Ramchandrapur','Mandumala','Nachol','Gomashtapur','Rohanpur','Kansart','Manaksha','Shibganj U.P.O'],
                'post_code'=>['6330','6303','6300','6301','6302','6311','6310','6321','6320','6341','6342','6340']
            ],
            (object)[
                'name'=>'Pabna',
                'thana'=>['Banwarinagar','Bera','Bhangura','Chatmohar','Debottar','Ishwardi','Pabna Sadar','Sathia','Sujanagar'],
                'post_office'=>['Banwarinagar','Bera','Kashinathpur','Nakalia','Puran Bharenga','Bhangura','Chatmohar','Debottar','Dhapari','Ishwardi','Pakshi','Rajapur','Hamayetpur','Kaliko Cotton Mills','Pabna Sadar','Sathia','Sagarkandi','Sujanagar'],
                'post_code'=>['6650','6680','6682','6681','6683','6640','6630','6610','6621','6620','6622','6623','6602','6601','6600','6670','6661','6660']
            ],
            (object)[
                'name'=>'Rajshahi',
                'thana'=>['Bagha','Bhabaniganj','Charghat','Durgapur','Godagari','Khod Mohanpur','Lalitganj','Putia','Rajshahi Sadar','Tanor'],
                'post_office'=>['Arani','Bagha','Bhabaniganj','Taharpur','Charghat','Sarda','Durgapur','Godagari','Premtoli','Khodmohanpur','Lalitganj','Rajshahi Sugar Mills','Shyampur','Putia','Binodpur Bazar','Ghuramara','Kazla','Rajshahi Canttonment','Rajshahi Court','Rajshahi Sadar','Rajshahi University','Sapura','Tanor'],
                'post_code'=>['6281','6280','6250','6251','6270','6271','6240','6290','6291','6220','6210','6211','6212','6260','6206','6100','6204','6202','6201','6000','6205','6203','6230']
            ],
            (object)[
                'name'=>'Sirajganj',
                'thana'=>['Baiddya Jam Toil','Belkuchi','Dhangora','Kazipur','Shahjadpur','Sirajganj Sadar','Tarash','Ullapara'],
                'post_office'=>['Baiddya Jam Toil','Belkuchi','Enayetpur','Rajapur','Sohagpur','Sthal','Dhangora','Malonga','Gandail','Kazipur','Shuvgachha','Jamirta','Kaijuri','Porjana','Shahjadpur','Raipur','Rashidabad','Sirajganj Sadar','Tarash','Lahiri Mohanpur','Salap','Ullapara','Ullapara R.S'],
                'post_code'=>['6730','6740','6751','6742','6741','6752','6720','6721','6712','6710','6711','6772','6773','6771','6770','6701','6702','6700','6780','6762','6763','6760','6761']
            ],
            (object)[
                'name'=>'Dinajpur',
                'thana'=>['Bangla Hili','Biral','Birampur','Birganj','Chrirbandar','Dinajpur Sadar','Khansama','Maharajganj','Nababganj','Osmanpur','Parbatipur','Phulbari','Setabganj'],
                'post_office'=>['Bangla Hili','Biral','Birampur','Birganj','Chrirbandar','Ranirbandar','Dinajpur Rajbari','Dinajpur Sadar','Khansama','Pakarhat','Maharajganj','Daudpur','Gopalpur','Nababganj','Ghoraghat','Osmanpur','Parbatipur','Phulbari','Setabganj'],
                'post_code'=>['5270','5210','5266','5220','5240','5241','5201','5200','5230','5231','5226','5281','5282','5280','5291','5290','5250','5260','5216']
            ],
            (object)[
                'name'=>'Gaibandha',
                'thana'=>['Bonarpara','Gaibandha Sadar','Gobindaganj','Palashbari','Phulchhari','Saadullapur','Sundarganj'],
                'post_office'=>['Bonarpara','saghata','Gaibandha Sadar','Gobindhaganj','Mahimaganj','Palashbari','Bharatkhali','Phulchhari','Naldanga','Saadullapur','Bamandanga','Sundarganj'],
                'post_code'=>['5750','5751','5700','5740','5741','5730','5761','5760','5711','5710','5721','5720']
            ],
            (object)[
                'name'=>'Kurigram',
                'thana'=>['Bhurungamari','Chilmari','Kurigram Sadar','Nageshwar','Rajarhat','Rajibpur','Roumari','Ulipur'],
                'post_office'=>['Bhurungamari','Chilmari','Jorgachh','Kurigram Sadar','Pandul','Phulbari','Nageshwar','Nazimkhan','Rajarhat','Rajibpur','Roumari','Bazarhat','Ulipur'],
                'post_code'=>['5670','5630','5631','5600','5601','5680','5660','5611','5610','5650','5640','5621','5620']
            ],
            (object)[
                'name'=>'Lalmonirhat',
                'thana'=>['Aditmari','Hatibandha','Lalmonirhat Sadar','Patgram','Tushbhandar'],
                'post_office'=>['Aditmari','Hatibandha','Kulaghat SO','Lalmonirhat Sadar','Moghalhat','Baura','Burimari','Patgram','Tushbhandar'],
                'post_code'=>['5510','5530','5502','5500','5501','5541','5542','5540','5520']
            ],
            (object)[
                'name'=>'Nilphamari',
                'thana'=>['Dimla','Domar','Jaldhaka','Kishoriganj','Nilphamari Sadar','Syedpur'],
                'post_office'=>['Dimla','Ghaga Kharibari','Chilahati','Domar','Jaldhaka','Kishoriganj','Nilphamari Sadar','Nilphamari Sugar Mil','Syedpur','Syedpur Upashahar'],
                'post_code'=>['5350','5351','5341','5340','5330','5320','5300','5301','5310','5311']
            ],
            (object)[
                'name'=>'Panchagarh',
                'thana'=>['Boda','Chotto Dab','Dabiganj','Panchagra Sadar','Tetulia'],
                'post_office'=>['Boda','Chotto Dab','Mirjapur','Dabiganj','Panchagar Sadar','Tetulia'],
                'post_code'=>['5010','5040','5041','5020','5000','5030']
            ],
            (object)[
                'name'=>'Rangpur',
                'thana'=>['Badarganj','Gangachara','Kaunia','Mithapukur','Pirgachha','Rangpur Sadar','Taraganj'],
                'post_office'=>['Badarganj','Shyampur','Gangachara','Haragachh','Kaunia','Mithapukur','Pirgachha','Alamnagar','Mahiganj','Rangpur Cadet Colleg','Rangpur Carmiecal Col','Rangpur Sadar','Rangpur Upa-Shahar','Taraganj'],
                'post_code'=>['5430','5431','5410','5441','5440','5460','5450','5402','5403','5404','5405','5400','5401','5420']
            ],
            (object)[
                'name'=>'Thakurgaon',
                'thana'=>['Baliadangi','Jibanpur','Pirganj','Rani Sankail','Thakurgaon Sadar'],
                'post_office'=>['Baliadangi','Lahiri','Jibanpur','Pirganj','Pirganj','Nekmarad','Rani Sankail','Ruhia','Shibganj','Thakurgaon Road','Thakurgaon Sadar'],
                'post_code'=>['5140','5141','5130','5110','5470','5121','5120','5103','5102','5101','5100']
            ],
            (object)[
                'name'=>'Habiganj',
                'thana'=>['Azmireeganj','Bahubal','Baniachang','Chunarughat','Habiganj Sadar','Kalauk','Madhabpur','Nabiganj'],
                'post_office'=>['Azmireeganj','Bahubal','Baniachang','Jatrapasha','Kadirganj','Chandpurbagan','Chunarughat','Narapati','Gopaya','Habiganj Sadar','Shaestaganj','Kalauk','Lakhai'
                    ,'Itakhola','Madhabpur','Saihamnagar','Shahajibazar','Digalbak','Golduba','Goplarbazar','Inathganj','Nabiganj'],
                'post_code'=>['3360','3310','3350','3351','3352','3321','3320','3322','3302','3300','3301','3340','3341','3331','3330','3333','3332','3373','3372','3371','3374','3370']
            ],
            (object)[
                'name'=>'Moulvibazar',
                'thana'=>['Baralekha','Kamalganj','Kulaura','Maulvi Bazar Sadar','Rajnagar','Srimangal'],
                'post_office'=>['Baralekha','Dhakkhinbag','Juri','Purbashahabajpur','Kamalganj','Keramatnaga','Munshibazar','Patrakhola','Shamsher Nagar','Baramchal','Kajaldhara','Karimpur','Kulaura','Langla','Prithimpasha','Tillagaon','Afrozganj','Barakapan','Monumukh','Maulvi Bazar Sadar','Rajnagar','Kalighat','Khejurichhara','Narain Chora','Satgaon','Srimangal'],
                'post_code'=>['3250','3252','3251','3253','3220','3221','3224','3222','3223','3237','3234','3235','3230','3232','3233','3231','3203','3201','3202','3200','3240','3212','3213','3211','3214','3210']
            ],
            (object)[
                'name'=>'Sunamganj',
                'thana'=>['Bishamsarpur','Chhatak','Dhirai Chandpur','Duara bazar','Ghungiar','Jagnnathpur','Sachna','Sunamganj Sadar','Tahirpur'],
                'post_office'=>['Bishamsapur','Chhatak','Chhatak Cement Facto','Chhatak Paper Mills','Chourangi Bazar','Gabindaganj','Gabindaganj Natun Ba','Islamabad','jahidpur','Khurma','Moinpur','Dhirai Chandpur','Jagdal','Duara bazar','Ghungiar','Atuajan','Hasan Fatemapur','Jagnnathpur','Rasulganj','Shiramsi','Syedpur','Sachna','Pagla','Patharia','Sunamganj Sadar','Tahirpur'],
                'post_code'=>['3010','3080','3081','3082','3893','3083','3084','3088','3087','3085','3086','3040','3041','3070','3050','3062','3063','3060','3064','3065','3061','3020','3001','3002','3000','3030']
            ],
            (object)[
                'name'=>'Sylhet',
                'thana'=>['Balaganj','Bianibazar','Bishwanath','Fenchuganj','Goainhat','Gopalganj','Jaintapur','Jakiganj','Kanaighat','Kompanyganj','Sylhet Sadar'],
                'post_office'=>['Balaganj','Begumpur','Brahman Shashon','Gaharpur','Goala Bazar','Karua','Kathal Khair','Natun Bazar','Omarpur','Tajpur','Bianibazar','Churkai','jaldup','Kurar bazar','Mathiura','Salia bazar','Bishwanath','Dashghar','Deokalas','Doulathpur','Singer kanch','Fenchuganj','Fenchuganj SareKarkh','Chiknagul','Goainhat','Jaflong','banigram','Chandanpur','Dakkhin Bhadashore','Dhaka Dakkhin','Gopalgannj','Ranaping','Jainthapur','Ichhamati','Jakiganj','Chatulbazar','Gachbari','Kanaighat','Manikganj','Kompanyganj','Birahimpur','Jalalabad','Jalalabad Cantoment','Kadamtali','Kamalbazer','Khadimnagar','Lalbazar','Mogla','Ranga Hajiganj','Shahajalal Science &','Silam','Sylhe Sadar','Sylhet Biman Bondar','Sylhet Cadet Col'],
                'post_code'=>['3120','3125','3122','3128','3124','3121','3127','3129','3126','3123','3170','3175','3171','3173','3172','3174','3130','3131','3133','3132','3134','3116','3117','3152','3150','3151','3164','3165','3162','3161','3160','3163','3156','3191','3190','3181','3183','3180','3182','3140','3106','3107','3104','3111','3112','3103','3113','3108','3109','3114','3105','3100','3102','3101']
            ]
        ];

        for ($i=0; $i < count($districts); $i++){
            if (count($districts[$i]->post_code) == count($districts[$i]->post_office)) {
                $district =  new DistrictList();
                $district->country_list_id = $bangladesh?$bangladesh->id:19;
                $district->name = $districts[$i]->name;
                $district->save();

                foreach ($districts[$i]->thana as $thana){
                    $thanaList = new ThanaList();
                    $thanaList->district_list_id = $district->id;
                    $thanaList->name = $thana;
                    $thanaList->save();
                }

                foreach ($districts[$i]->post_office as $key => $post_office){
                    $postOffice = new PostOfficeList();
                    $postOffice->district_list_id = $district->id;
                    $postOffice->name = $post_office;
                    $postOffice->post_code = $districts[$i]->post_code[$key];
                    $postOffice->save();
                }
            }
        }
    }
}
