<div class="card mb-3">
    <h2 class="card-header bg-secondary">
        @lang('pools.poolManagerForPool') "{{ $poolData->name }}"
    </h2>
    <div class="card-body">
        <p>@lang('pools.poolManagerExplanation')</p>
        @php($configServiceLocales = \Config::get('app.serviceLocales'))
        @php($officialSourceLanguages = \Modules\UiTables\Entities\Sourcelanguage::whereIn('code', $configServiceLocales)->get())
        @php($officialSourceLanguagesId = \Modules\UiTables\Entities\Sourcelanguage::whereIn('code', $configServiceLocales)->pluck('id')->toArray())
            <div id="myBtnContainer">
                    <a class="btn active" onclick="filterSelection('all')" 
                    id="filter-all-tab">
                    @lang('interface.resetFilter')
                    </a>
                @forelse($officialSourceLanguages as $serviceLocales)
                    <a class="btn bg-secondary" onclick="filterSelection('{{$serviceLocales->region}}')" 
                    id="filter-{{$serviceLocales->region}}">{{$serviceLocales->region}}</a>
                
                    @empty
                @endforelse
            </div>
            <div class="container" id="filtered-Content">
                @foreach($officialSourceLanguages as $case)
                    @forelse($managersForCurrentPool->where('language_id', $case->id) as $poolManager)
                        <div class="card">
                                @php($pm = 0)
                                @forelse($managersForCurrentPool as $poolManager)
                                    @if(in_array($poolManager->language_id, $officialSourceLanguagesId))
                                        <div class="filterDiv {{$serviceLocales->region}} collapse row no-gutters py-1 border-bottom">
                                            <h5 class="col-md-7 mb-0">
                                                <form id="showMember{{$pm}}" method="POST" action="{{ route('show-public-profile') }}">
                                                    @csrf
                                                    <img class="d-block mr-2 float-left" height="16" alt="{{ $poolManager->language->code }}" 
                                                    src="{!! asset('img/flags/'.$poolManager->language->code.'.png') !!}" />
                                                    <input id="userPool{{$pm}}" type="hidden" name="user_pool" value="{{ Crypt::encrypt($poolData->code) }}" />
                                                    <input id="input{{$pm}}" type="hidden" name="user_request" value="{{ Crypt::encrypt($poolManager->manager->id) }}" />
                                                    <button role="button" form="showMember{{$pm}}" type="submit" class="btn-link text-dark d-inline-block mr-2" href="#" 
                                                    onclick="$(this).closest('form').submit()">
                                                        {{ $poolManager->manager->firstname }}
                                                        {{ $poolManager->manager->surname }}
                                                    </button>
                                                </form>
                                            </h5>
                                            <div class="col-auto ml-auto">
                                                {{ $poolManager->userProfile->phone }}
                                            </div>
                                            <div class="col-auto ml-3">
                                                    <button role="button" class="text-dark d-inline-block mr-2" href="#" 
                                                    form="showMember{{$pm}}" type="submit">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    @endif
                                    @php($pm++)
                                    @empty
                                        <div class="card mb-3">
                                            <h5 class="card-header text-light p-1" style="background-color:tomato ">
                                                <span class="fa fa-bolt mr-2 d-block"></span>
                                                @lang('pool.becomeAFirstJoiner')
                                            </h5>
                                            <p class="px-2">
                                                <small>
                                                    @lang('pool.becomeAFirstJoinerExplanation')
                                                </small>
                                            </p>
                                        </div>
                                @endforelse
                        </div>
                    @empty
                    @endforelse
                @endforeach 
            </div>

    </div>
</div>
<!-- Control buttons -->
<div id="myBtnContainer">
          <button class="btn active" onclick="filterSelection('all')"> Show all</button>
          <button class="btn" onclick="filterSelection('cars')"> Cars</button>
          <button class="btn" onclick="filterSelection('animals')"> Animals</button>
          <button class="btn" onclick="filterSelection('fruits')"> Fruits</button>
          <button class="btn" onclick="filterSelection('colors')"> Colors</button>
        </div>
        
        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
          <div class="filterDiv cars">BMW</div>
          <div class="filterDiv colors fruits">Orange</div>
          <div class="filterDiv cars">Volvo</div>
          <div class="filterDiv colors">Red</div>
          <div class="filterDiv cars animals">Mustang</div>
          <div class="filterDiv colors">Blue</div>
          <div class="filterDiv animals">Cat</div>
          <div class="filterDiv animals">Dog</div>
          <div class="filterDiv fruits">Melon</div>
          <div class="filterDiv fruits animals">Kiwi</div>
          <div class="filterDiv fruits">Banana</div>
          <div class="filterDiv fruits">Lemon</div>
          <div class="filterDiv animals">Cow</div>
        </div> 
<script>
@push('scripts')
<style>
.container {
  overflow: hidden;
}

.filterDiv {
  float: left;
  background-color: #2196F3;
  color: #ffffff;
  width: 100px;
  line-height: 100px;
  text-align: center;
  margin: 2px;
  display: none; /* Hidden by default */
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Add a light grey background on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #666;
  color: white;
} </style>
@endpush

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>