<section class="p-5  text-uppercase" id="products">
      <h1 class="bg-danger text-center">here are some of our products</h1>

    <div class="container bg-warning text-center">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">PINK FLOWER BUSH</h5>
                <p class="card-text">BEST FLOWER TO BUY ON YOYR FIRST DATE</p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-2.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">amber sunflower bush</h5>
                <p class="card-text">
                  has a very nice fragrance and is very appealing
                </p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-3.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">red flower bush</h5>
                <p class="card-text">
                  very bright and vibrantcan be gifeted in different occasions
                </p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>
        </div>

        <!--    ` SECOND ROW     BEGINS                                              -->
        <div class="row mt-4" id="rw-2">
          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-4.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">rose bush</h5>
                <p class="card-text">
                  the best han-picked rose sticks from our garden
                </p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-5.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">white rose</h5>
                <p class="card-text">
                  the best han-picked rose sticks from our garden
                </p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-6.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">rose bush</h5>
                <p class="card-text">
                  the best hand-picked rose sticks from our garden
                </p>
                <button class="pbut"><i class="fa-solid fa-naira-sign">4000</i></button>
              </div>
            </div>
          </div>
        
        </div>


    </div>

    <section>
      <h1>new products</h1>
    <?php
    $dist = "../../productimages/";
    Prddisp($conn,$dbtab2,$dist);
    ?>

  </section>