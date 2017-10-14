<?php
function getImageURLs($animal, $age, $size, $sex, $location="93940") {

    $key = '312878abcea99018acfbe7e21c2bae04';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.petfinder.com/pet.find?key=$key&animal=$animal&age=$age&size=$size&sex=$sex&location=$location&format=json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
    ));

    $pet_json = curl_exec($curl);

    if (curl_errno($curl)) {
        print curl_error($curl);
    }

    $pet_array = json_decode($pet_json);
    $pets = array();

    for ($i = 0; $i < count($pet_array->petfinder->pets->pet) ; $i++) {
        $pets[$i]['img_url'] = $pet_array->petfinder->pets->pet[$i]->media->photos->photo[1]->{'$t'};
        $pets[$i]['name'] = $pet_array->petfinder->pets->pet[$i]->name->{'$t'};
        $pets[$i]['age'] = $pet_array->petfinder->pets->pet[$i]->age->{'$t'};
        $pets[$i]['size'] = $pet_array->petfinder->pets->pet[$i]->size->{'$t'};
        $pets[$i]['sex'] = $pet_array->petfinder->pets->pet[$i]->sex->{'$t'};
        $pets[$i]['description'] = $pet_array->petfinder->pets->pet[$i]->description->{'$t'};
        $pets[$i]['url'] = "https://www.petfinder.com/petdetail/" . $pet_array->petfinder->pets->pet[$i]->id->{'$t'};
    }
    curl_close($curl);
   return $pets;
}

?>
