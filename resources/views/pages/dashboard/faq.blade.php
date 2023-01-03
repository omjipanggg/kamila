@extends('layouts.base')
@section('content')
<div class="container-fluid" id="faq">
    <div class="row">
        <div class="col">

        <div class="row">
            <div class="col">
                <h1 class="dash mt-3">Dashboard</h1>
                @include('components.breadcrumb')
            </div>
        </div>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Bagaimana cara mengoperasikan sistem ini?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde aut soluta laborum possimus aliquid assumenda qui, voluptates aspernatur amet itaque maxime quidem, totam culpa corrupti eligendi? Vitae porro blanditiis cumque, molestiae tempora quo autem quos pariatur reprehenderit dignissimos, officia iure assumenda dolorem aperiam a ullam amet facilis maiores recusandae. Saepe qui eveniet sint voluptatibus sit tenetur ratione, quis, nemo natus assumenda aperiam iusto fugiat provident fugit a, iste rem. Libero quae praesentium fugit. Earum possimus ut repellat, labore a, doloribus?</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Apa saja yang perlu diperhatikan?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium soluta a incidunt vel sed, est consectetur culpa natus velit officia repudiandae, alias. Id amet dolorum voluptates sed. Quibusdam asperiores harum unde, veritatis soluta repellendus dolorem in atque omnis sapiente beatae?</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Apakah saya bisa melakukan pendaftaran melalui sistem ini?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis rem error voluptatum eius, corporis. Facilis incidunt adipisci nulla quasi assumenda?</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection