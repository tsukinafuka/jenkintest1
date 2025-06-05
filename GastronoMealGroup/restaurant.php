<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css?v=7.0" />
    <link rel="stylesheet" href="css/header2.css" />

    <!-- Dependencies CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <!-- /!\ IMPORTANT - Link Verif - connect - user /!\ -->
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>
</head>
<body>
    <?php include_once("header2.php");?>

    <div class="containerPrincipal">
        <div class="adresse-user-infos">
            <!-- <div id="userInfo2" class="userInfoRestau"></div> -->
        </div>
        <div class="headerRestaurant">
            <input type="text" placeholder=" 🔍 exemple..." style="width:98%; border-radius: 20px;">
        </div>
        <!-- Carousel Icon Bar -->
        <div id="iconCarouselContainer-abx">
            <div id="iconCarouselTrack-abx">
                <!-- 12 icons (ex: Bootstrap, GitHub, etc.) -->
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-icon.svg" alt="icon 1" />Burgers</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-fries-icon.svg" alt="icon 2" />Fasfood</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/hot-dog-icon.svg" alt="icon 3" />Américaine</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/fruits-vegetables/salad-vegetable-icon.svg" alt="icon 4" />Salades</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chopsticks-icon.svg" alt="icon 5" />Sushis</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/popcorn-icon.svg" alt="icon 6" />Desserts</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/household-and-furniture/cups-icon.svg" alt="icon 7" />Cafés</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-dish-icon.svg" alt="icon 8" />Réserver</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/pickle-jar-icon.svg" alt="icon 9" />Epicé</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/taco-icon.svg" alt="icon 10" />Tacos</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chocolate-icon.svg" alt="icon 11" />Sucre</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/dessert-ice-cream-icon.svg" alt="icon 12" />Glaces</div>

                <!-- Groupe 2 (identique, pour loop fluide) -->
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-icon.svg" alt="icon 1" />Burgers</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-fries-icon.svg" alt="icon 2" />Fasfood</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/hot-dog-icon.svg" alt="icon 3" />Américaine</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/fruits-vegetables/salad-vegetable-icon.svg" alt="icon 4" />Salades</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chopsticks-icon.svg" alt="icon 5" />Sushis</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/popcorn-icon.svg" alt="icon 6" />Desserts</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/household-and-furniture/cups-icon.svg" alt="icon 7" />Cafés</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-dish-icon.svg" alt="icon 8" />Réserver</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/pickle-jar-icon.svg" alt="icon 9" />Epicé</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/taco-icon.svg" alt="icon 10" />Tacos</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chocolate-icon.svg" alt="icon 11" />Sucre</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/dessert-ice-cream-icon.svg" alt="icon 12" />Glaces</div>

                <!-- Groupe 2 (identique, pour loop fluide) -->
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-icon.svg" alt="icon 1" />Burgers</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/burger-fries-icon.svg" alt="icon 2" />Fasfood</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/hot-dog-icon.svg" alt="icon 3" />Américaine</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/fruits-vegetables/salad-vegetable-icon.svg" alt="icon 4" />Salades</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chopsticks-icon.svg" alt="icon 5" />Sushis</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/popcorn-icon.svg" alt="icon 6" />Desserts</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/household-and-furniture/cups-icon.svg" alt="icon 7" />Cafés</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-dish-icon.svg" alt="icon 8" />Réserver</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/pickle-jar-icon.svg" alt="icon 9" />Epicé</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/taco-icon.svg" alt="icon 10" />Tacos</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/chocolate-icon.svg" alt="icon 11" />Sucre</div>
                <div class="iconCarouselItem-abx"><img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/dessert-ice-cream-icon.svg" alt="icon 12" />Glaces</div>
            </div>
        </div>
        <div class="content-buttons">
            <button class="btn-restaurants">🏷️ <strong>Offres</strong></button>
            <button class="btn-restaurants"><strong>Prix $</strong></button>
            <button class="btn-restaurants"><strong>Frais de livraison *</strong></button>
            <button class="btn-restaurants">🏅 <strong>Les mieux notés</strong></button>
            <button class="btn-restaurants"><strong>Diététique *</strong></button>
            <button class="btn-restaurants"><strong>Trier *</strong></button>
        </div>
        <div class="content-restaurants">
            <div class="content-restaurants-double">
                <!-- <div class="title-restaurant"></div>-->
                <div class="card-restaurant">
                    
                    <div>
                        <a href="plats.php"> 
                            <img src="images/br.png" alt="attention">
                            <h5>BurgerRing</h5>
                            <p>4.1⭐(600+)·10 min</p>
                        </a>
                    </div>
                </div>
                <div class="card-restaurant">
                    <div>
                        <img src="images/mr.png" alt="attention">
                        <h5>MacRonald</h5>
                        <p>4.3⭐(898+)·23 min</p>
                    </div>
                </div>
            </div>
            <div class="content-restaurants-simple">
                <div>
                    <img src="images/burger.jpg" alt="im">
                </div>
                <div>
                    <img src="images/pizza-restaurant.jpg" alt="im">
                </div>
                <div>
                    <img src="images/burger-frite.jpg" alt="im">
                </div>
                <div>
                    <img src="images/hotdog.jpg" alt="im">
                </div>
            </div>
            <div class="content-restaurants-double">
                <!-- <div class="title-restaurant"></div>-->
                <div class="card-restaurant">
                    <div>
                        <img src="images/pn.png" alt="attention">
                        <h5>BurgerRing</h5>
                        <p>4.1⭐(600+)·10 min</p>
                    </div>
                </div>
                <div class="card-restaurant">
                    <div>
                        <img src="images/ofuegos.png" alt="attention">
                        <h5>MacRonald</h5>
                        <p>4.3⭐(898+)·23 min</p>
                    </div>
                </div>
            </div>
            <div class="content-restaurants-simple">
                <div>
                    <img src="images/burger.jpg" alt="im">
                </div>
                <div>
                    <img src="images/pizza-restaurant.jpg" alt="im">
                </div>
                <div>
                    <img src="images/burger-frite.jpg" alt="im">
                </div>
                <div>
                    <img src="images/hotdog.jpg" alt="im">
                </div>
            </div>
            <div class="content-restaurant-simple" style="padding: 20px;">
                <button class="btn-plus-restaurant">Afficher plus</button>
            </div>
        </div>
    </div>

<!-- Place the script outside the HTML -->
<script src="./js/user.js"></script>
<script src="./js/validateToken.js"></script>
<script>
    const app = Vue.createApp({
        data() {
            return {
               
            };
        },
        
        methods: {
            
        }
    });

    app.mount('#app');
</script>
<div class="pb-24"></div>
<?php

    include_once("footer.php");

    ?>
</body>
</html>
