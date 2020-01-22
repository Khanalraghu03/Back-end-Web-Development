<?php

function showImage($weather){
    if($weather == "sunny") {
        $image = "https://rebelfinancial.com/wp-content/uploads/2018/03/vibrant-sunrise-yellow-500x500.jpg";

    } else if($weather == "rainy") {
        $image = "https://patch.com/img/cdn20/users/22992871/20190313/094116/styles/raw/public/processed_images/donatphotography_rain_umbrella_shutterstock_728383990_copy-1552484394-5009.jpg";
    } else if($weather == "cloudy") {
        $image = "https://www.farmersalmanac.com/wp-content/uploads/2011/09/Clouds-Predict-Local-Weather-i861387936-600x319.jpg";
    }else {
        $image = "https://i.pinimg.com/originals/59/ec/6a/59ec6ab4271b5c64028dce53b2d41d28.jpg";
    }

    echo "<img src='".$image."' height=200px width=200px>";
}

?>