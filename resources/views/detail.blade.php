@extends('layouts.app')


@section('css')


@endsection


@section('content')
<br>
<div class="container">
  <div class="">
      <ul class="nav nav-tabs">
          <li class="nav-item">
              <a href="#poster" data-toggle="tab" aria-expanded="false" class="nav-link active">
                  Poster
              </a>
          </li>
          <li class="nav-item">
              <a href="#syarat_ketentuan" data-toggle="tab" aria-expanded="true" class="nav-link">
                  Syarat & Ketentuan
              </a>
          </li>
          <li class="nav-item">
              <a href="#daftar" data-toggle="tab" aria-expanded="false" class="nav-link">
                  Daftar disini
              </a>
          </li>
      </ul>
      <br>
          <div class="tab-content">
              <div class="tab-pane active" id="poster">
                  <img src="{{$lomba->poster}}" class="img-thumbnail" alt="">
              </div>
              <div class="tab-pane" id="syarat_ketentuan">
                  <h6>Pembagian Kategori :</h6>
                  <br>
                  <h6>Daftar Lagu Pilihan</h6>

            <div id="accordion1" class="">
              <div class="container">
                <div class="">
                      <div class="panel-heading">
                        <h6 class="panel-title" style="padding: 0;">
                          <a class="collapsed btn btn-info" href="#pilih1" data-toggle="collapse" data-parent="#accordion1">
                             Kategori A ( Sekolah kelas 1-2 SD / TK / Homeschooler lahir thn 2010 dan sebelumnya )
                          </a>
                        </h6>
                      </div>
                  <div id="pilih1" class="panel-collapse collapse" style="height: 0px;">
                      <ol>
                      <li>A1 Es Lilin dari Piano Kawanku II L. Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKR3FOZlVGYzdQVjQ" target="_blank">Klik Disini</a></li>
                      <li>A2 Rusa dari Piano Kawanku I L.Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKdkJpWlpydVlENU0" target="_blank"> Klik Disini</a></li>
                      <li>A3 Etude from W Caroll dari Piano Kawanku I L.Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKNWY3ckJHSlpHbGc" target="_blank"> Klik Disini</a></li>
                      <li>A4 Late at Night. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKWU9hUk1VVXpHS28" target="_blank"> Klik Disini</a></li>
                      <li>A5 Shostakovich Valse no 2 dari 6 Children Pieces. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKeHRmN1lYLThUR0U" target="_blank"> Klik Disini</a></li>
                      <li>A6 Folk Dean: no 203. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKUmhmMHdrR0xMejg" target="_blank"> Klik Disini</a></li>
                      <li>A7 Alfred Lesson Book Complete Level: The Magic Man. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKS3BuNl9rMExaSGc" target="_blank"> Klik Disini</a></li>
                      <li>A8 Poco Piano for Young Children 2: Waltz of the Bees. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKRGxEdWZOVWtXMDQ" target="_blank"> Klik Disini</a></li>
                    </ol>
                </div>
              </div>
            </div>
          </div>

          <div id="accordion2" class="">
            <div class="container">
              <div class="">
                    <div class="panel-heading">
                      <h6 class="panel-title" style="padding: 0;">
                        <a class="btn btn-info" href="#pilih2" data-toggle="collapse" data-parent="#accordion2">
                           Kategori A ( Sekolah kelas 1-2 SD / TK / Homeschooler lahir thn 2010 dan sebelumnya )
                        </a>
                      </h6>
                    </div>
                <div id="pilih2" class="panel-collapse collapse" style="height: 0px;">
                    <ol>
                    <li>A1 Es Lilin dari Piano Kawanku II L. Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKR3FOZlVGYzdQVjQ" target="_blank">Klik Disini</a></li>
                    <li>A2 Rusa dari Piano Kawanku I L.Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKdkJpWlpydVlENU0" target="_blank"> Klik Disini</a></li>
                    <li>A3 Etude from W Caroll dari Piano Kawanku I L.Kodijat. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKNWY3ckJHSlpHbGc" target="_blank"> Klik Disini</a></li>
                    <li>A4 Late at Night. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKWU9hUk1VVXpHS28" target="_blank"> Klik Disini</a></li>
                    <li>A5 Shostakovich Valse no 2 dari 6 Children Pieces. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKeHRmN1lYLThUR0U" target="_blank"> Klik Disini</a></li>
                    <li>A6 Folk Dean: no 203. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKUmhmMHdrR0xMejg" target="_blank"> Klik Disini</a></li>
                    <li>A7 Alfred Lesson Book Complete Level: The Magic Man. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKS3BuNl9rMExaSGc" target="_blank"> Klik Disini</a></li>
                    <li>A8 Poco Piano for Young Children 2: Waltz of the Bees. Partitur : <a href="https://drive.google.com/open?id=0B4VSsZ4oOhZKRGxEdWZOVWtXMDQ" target="_blank"> Klik Disini</a></li>
                  </ol>
              </div>
            </div>
          </div>
        </div>



              </div>
              <div class="tab-pane" id="daftar">
                  <p><strong>Pendaftaran!!</strong> <button type="button" class="btn btn-primary" name="button">Daftar</button></p>

              </div>
          </div>
    </div>
</div>

@endsection


@section('js')

@endsection
