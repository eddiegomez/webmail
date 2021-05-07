<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12" style="heigth: 30px">
        <div class="card" style="heigth: 30px">
          <div class="card-body" style="padding: 0px; heigth: 30px">
            <div
              class="hs-item set-bg"
              style="
                background-image: url(/template_front/img/bg.jpg);
                height: 450px;
                width: 100%;
              "
            >
              <div class="container">
                <div class="row">
                  <div
                    class="col-xl-7 col-lg-10 text-white"
                    style="padding: 50px"
                  >
                    <span>New Arrivals</span>
                    <h2
                      style="
                        font-size: 60px;
                        text-transform: uppercase;
                        font-weight: 700;
                        margin-bottom: 10px;
                        position: relative;
                        top: 50px;
                      "
                    >
                      denim jackets
                    </h2>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus
                      commodo viverra maecenas accumsan lacus vel facilisis.
                    </p>
                    <a href="/artigos" class="site-btn sb-line">Explorar</a>
                    <a href="/artigos" class="site-btn sb-white"
                      >Adicionar ao carrinho</a
                    >
                  </div>
                </div>
                <div
                  class=""
                  style="
                    position: absolute;
                    right: 100px;
                    top: 226px;
                    width: 162px;
                    height: 162px;
                    border-radius: 50%;
                    background: #f51167;
                    text-align: center;
                    padding-top: 20px;
                  "
                >
                  <div
                    class="offer-card text-white"
                    style="
                      position: absolute;
                      width: calc(100% - 10px);
                      height: calc(100% - 10px);
                      border: 1px solid #f96790;
                      border-radius: 50%;
                      left: 5px;
                      top: 5px;
                    "
                  >
                    <span
                      style="
                        font-size: 18px;
                        padding-top: 50px !important;
                        font-weight: 400;
                      "
                      ><h3>desde</h3></span
                    >
                    <h2
                      style="display: inline; font-size: 72px; font-weight: 400"
                    >
                      350
                    </h2>
                    <h6 style="display: inline">MT</h6>
                    <p
                      style="
                        text-transform: uppercase;
                        font-size: 10px;
                        line-height: 1;
                      "
                    >
                      Compre já
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
