@extends('layouts.app')

@section('content')
<div class="container">
    <section id="match">
      <div class="row">
        <div class="box col-12">
          {{-- <img class="img-fluid bgp1" src="/images/emilio-garcia-AWdCgDDedH0-unsplash.jpg" alt="background soccer league"> --}}
          <div class="img-title">

            {{-- <h1 class="text-white display-4 ">West Island Oldtimers</h1>
            <h1 class="text-white display-4 ">Soccer League</h1> --}}


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">

                <div class="carousel-item active">
                  <div class="card  mb-3">
                    <div class="card-header bg-primary text-white ">
                      <h4> Sun, 04 AUG 2020 16:00 </h4>
                      <h3>TURF </h3>
                    </div>
                    <div class="card-body  ">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="cart-title">Phenix </h4>
                          <h2> <span class="badge badge-primary"> 4 </span></h2>
                        </div>
                        <div class="col-md-6">
                          <h4 class="cart-title">Cuervo</h5>
                            <h2> <span class="badge badge-danger"> 2 </span></h2>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-primary">
                      <h4 class="text-white">Dorval Comunite</h4>
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="card  mb-3">
                    <div class="card-header bg-primary text-white ">
                      <h4> Sun, 04 AUG 2020 16:00 </h4>
                      <h3>GRASS </h3>
                    </div>
                    <div class="card-body  ">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="cart-title">SVG </h4>
                          <h2> <span class="badge badge-success"> 2 </span></h2>
                        </div>
                        <div class="col-md-6">
                          <h4 class="cart-title">Dollard</h5>
                            <h2> <span class="badge badge-success"> 2 </span></h2>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-primary">
                      <h4 class="text-white">Roxboro 9th Ave.</h4>
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="card  mb-3">
                    <div class="card-header bg-primary text-white ">
                      <h4> Sun, 04 AUG 2020 16:00 </h4>
                      <h3>FIELD </h3>
                    </div>
                    <div class="card-body  ">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="cart-title">Hilltoppers </h4>
                          <h2> <span class="badge badge-danger"> 3 </span></h2>
                        </div>
                        <div class="col-md-6">
                          <h4 class="cart-title">Cuervos</h5>
                            <h2> <span class="badge badge-primary"> 4 </span></h2>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-primary">
                      <h4 class="text-white">Dollard Lake Street</h4>
                    </div>
                  </div>
                </div>

              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark " aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>

        </div>


      </div>
    </section>
    <section id="table" class="bg-light ">
      <div class="row ">
        <div class="col-12">
          <div class="table-responsive ">
          <table class="table table-hover table-striped table-bordered table-sm ">
            <thead class="bg-dark text-white">
              <tr>
                <th>#</th>
                <th>TEAM</th>
                <th>GP</th>
                <th>W</th>
                <th>L</th>
                <th>D</th>
                <th>GF</th>
                <th>GA</th>
                <th>GD</th>
                <th>PTS</th>
                <th>Y</th>
                <th>R</th>

              </tr>
            </thead>
            <tbody>
              <tr >
                <th scope="row">1</th>
                <td>Roxboro Rockbottons</td>
                <td>10</td>
                <td>8</td>
                <td>1</td>
                <td>1</td>
                <td>37</td>
                <td>7</td>
                <td>30</td>
                <td>25</td>
                <td>0</td>
                <td>1</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Challengers</td>
                <td>9</td>
                <td>7</td>
                <td>1</td>
                <td>1</td>
                <td>39</td>
                <td>8</td>
                <td>31</td>
                <td>22</td>
                <td>4</td>
                <td>1</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Hilltoppers</td>
                <td>8</td>
                <td>5</td>
                <td>2</td>
                <td>1</td>
                <td>21</td>
                <td>17</td>
                <td>4</td>
                <td>16</td>
                <td>14</td>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Phenix</td>
                <td>9</td>
                <td>5</td>
                <td>4</td>
                <td>0</td>
                <td>20</td>
                <td>20</td>
                <td>0</td>
                <td>15</td>
                <td>13</td>
                <td>1</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        </div>
      </div>
    </section>

    <section id="tab" class="bg-light mt-2 rounded">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Match</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Cards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Games</a>
        </li>
      </ul>
      <div class="tab-content " id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row">
            <div class="col-12">
              <table class="table table-sm">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>#</th>
                    <th>TEAM</th>
                    <th>GP</th>
                    <th>W</th>
                    <th>L</th>
                    <th>D</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>GD</th>
                    <th>PTS</th>
                    <th>Y</th>
                    <th>R</th>
    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Roxboro Rockbottons</td>
                    <td>10</td>
                    <td>8</td>
                    <td>1</td>
                    <td>1</td>
                    <td>37</td>
                    <td>7</td>
                    <td>30</td>
                    <td>25</td>
                    <td>0</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Challengers</td>
                    <td>9</td>
                    <td>7</td>
                    <td>1</td>
                    <td>1</td>
                    <td>39</td>
                    <td>8</td>
                    <td>31</td>
                    <td>22</td>
                    <td>4</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Hilltoppers</td>
                    <td>8</td>
                    <td>5</td>
                    <td>2</td>
                    <td>1</td>
                    <td>21</td>
                    <td>17</td>
                    <td>4</td>
                    <td>16</td>
                    <td>14</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Phenix</td>
                    <td>9</td>
                    <td>5</td>
                    <td>4</td>
                    <td>0</td>
                    <td>20</td>
                    <td>20</td>
                    <td>0</td>
                    <td>15</td>
                    <td>13</td>
                    <td>1</td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          </div>  
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">text 2</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">text 3</div>
      </div>
    </section>

  </div>
@endsection