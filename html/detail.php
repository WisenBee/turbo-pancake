<?php
include_once '../additional/config.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tutorial</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
  <!-- CSS -->
  <link href="../css/detail.css" rel="stylesheet">
  <meta name="robots" content="noindex,follow" />

</head>

<body>
  <?php
  $id = $_GET['id']; // get the ID parameter from the URL
  $sql = "SELECT * FROM produits WHERE num = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <main class="container">
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
          <img data-image="red" class="active" src="../images/<?php echo $row['url']; ?>" alt="">
        </div>

        <!-- Right Column -->
        <div class="right-column">
          <!-- Product Description -->
          <div class="product-description">
            <span>
              <?php echo $row['categorie']; ?>
            </span>
            <h1>
              <?php echo $row['nom']; ?>
            </h1>
            <p>
              <?php echo $row['description']; ?>
            </p>
          </div>

          <!-- Product Configuration -->
          <div class="product-configuration">
            <!-- Product Color -->
            <div class="product-color">
              <span>Color</span>

              <div class="color-choose">
                <div>
                  <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                  <label for="red"><span></span></label>
                </div>
                <div>
                  <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                  <label for="blue"><span></span></label>
                </div>
                <div>
                  <input data-image="black" type="radio" id="black" name="color" value="black">
                  <label for="black"><span></span></label>
                </div>
              </div>
            </div>
          </div>

          <!-- Product Pricing -->
          <div class="product-price">
            <span>
              <?php echo $row['prix']; ?>$
            </span>
            <a href="payMode.html" class="cart-btn" >Add to cart</a>
          </div>
        </div>
      </main>
  <?php
    }
  } else {
    echo "No product found with ID: $id";
  }
  ?>


  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
  <script src="../js/detail.js" charset="utf-8"></script>
</body>

</html>