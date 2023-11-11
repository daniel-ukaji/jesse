<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-10 col-md-10 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-2">
                <h3>A little more about yourself</h3>
            </div>
            <div class="progress mb-3" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 90%">90%</div>
            </div>
            @php
                Auth::user()->country != '' ? ($isActive = false) : ($isActive = true);
            @endphp
            <form method="POST" action="{{ url('profile', auth()->id()) }}" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PATCH')
                {{-- pets --}}
                <div class="col-md-3">
                    <label for="pets" class="form-label fw-bold">Do you have pets? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="pets" name="pets"
                        required>
                        <option value="{{ Auth::user()->pets }}" selected disabled>
                            {{ Auth::user()->pets ? Auth::user()->pets . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- smoke --}}
                <div class="col-md-3">
                    <label for="smokes" class="form-label fw-bold">Do you smoke? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="smokes" name="smokes"
                        required>
                        <option value="{{ Auth::user()->smokes }}" selected disabled>
                            {{ Auth::user()->smokes ? Auth::user()->smokes . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- drink --}}
                <div class="col-md-3">
                    <label for="drinks" class="form-label fw-bold">Do you drink? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="drinks" name="drinks"
                        required>
                        <option value="{{ Auth::user()->drinks }}" selected disabled>
                            {{ Auth::user()->drinks ? Auth::user()->drinks . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes, once a week">Yes, once a week</option>
                        <option value="Yes, socially">Yes, socially</option>
                        <option value="Yes, moderately">Yes, moderately</option>
                        <option value="I'm one drink from being admitted to AA">I'm one drink from being admitted to AA
                        </option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- drugs --}}
                <div class="col-md-3">
                    <label for="drugs" class="form-label fw-bold">Do you do drugs? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="drugs" name="drugs"
                        required>
                        <option value="{{ Auth::user()->drugs }}" selected disabled>
                            {{ Auth::user()->drugs ? Auth::user()->drugs . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <input name="form" value="form4" hidden>
                {{-- How jelous --}}
                <div class="col-md-3">
                    <label for="how_jelly" class="form-label fw-bold">Jealous type? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="how_jelly" name="how_jelly"
                        required>
                        <option value="{{ Auth::user()->how_jelly }}" selected disabled>
                            {{ Auth::user()->how_jelly ? Auth::user()->how_jelly . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- profile pic --}}
                <div class="col-md-3">
                    <label for="profile_pic" class="form-label fw-bold">Profile Picture</label>
                    <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                </div>

                {{-- display pic --}}
                <div class="col-md-3">
                    <label for="dp_1" class="form-label fw-bold">Display Picture</label>
                    <input class="form-control" type="file" name="dp_1" id="dp_1">
                </div>

                {{-- display pic --}}
                <div class="col-md-3">
                    <label for="dp_2" class="form-label fw-bold">Display Picture</label>
                    <input class="form-control" type="file" name="dp_2" id="dp_2">
                </div>
                
                {{-- country --}}
                <div class="col-md-12">
                    <label for="country" class="form-label fw-bold">What country do you reside? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="country" name="country"
                        required>
                        <option value="{{ Auth::user()->country }}" selected disabled>
                            {{ Auth::user()->country ? Auth::user()->country . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Canada">Canada</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label fw-bold">What State do you reside? <b
                            class="text-danger">*</b></label>
                            
                            <input type="text" name="state" id="st" hidden>
                    <select class="form-select" aria-label="Default select example" onchange="getState(this.value)" id="state1"  name="state"
                       >
                        {{-- <option value="{{ Auth::user()->state }}" selected disabled>
                            {{ Auth::user()->state ? Auth::user()->states->name . __(' • ') : __('Select State') }}
                        </option> --}}
                        <option selected disabled>Select State</option>
                        @foreach($usas as $us)
                        <option value="{{$us->StateID}}" @if(Auth::user()->state==$us->StateID ) Selected @endif >{{$us->name}} @if(Auth::user()->state==$us->StateID )  •  @endif</option>
                        @endforeach
                    </select>
                    <select class="form-select"  onchange="getState(this.value)"  aria-label="Default select example" id="state2" 
                        >
                        {{-- <option value="{{ Auth::user()->state }}" selected disabled>
                            {{ Auth::user()->state ? Auth::user()->states()->name . __(' • ') : __('Select State') }}
                        </option> --}}
                        <option selected disabled>Select State</option>
                        @foreach($canadas as $canada)
                        <option value="{{$canada->StateID}}" @if(Auth::user()->state==$canada->StateID ) Selected @endif >{{$canada->name}} @if(Auth::user()->state==$canada->StateID ) • @endif</option>
                        @endforeach
                    </select>
                    <select class="form-select" aria-label="Default select example" id="state3" name=""
                        >
                        <option selected>Select State</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label fw-bold">What city are located?</label>
                    <input class="form-control" type="text" name="city" id="city"
                        placeholder="Your City" value="{{ old('city', Auth::user()->city) }}">
                </div>

                <div class="mt-4 d-flex align-item-center justify-content-between">
                    <div>
                        <a href="{{url('/')}}">
                            <button type="submit" class="btn btn-success shadow fw-bold">Save</button>
                        </a>
                    </div>
                    <div>
                        <a href="{{url('/profile/edit/form/3')}}" class="btn btn-outline-dark shadow fw-bold">
                            <i class="bi bi-arrow-bar-left"></i> Back
                        </a>
                        <button href="{{('/')}}" @class([
                            'btn',
                            'btn-danger',
                            'disabled' => $isActive,
                            'shadow',
                            'fw-bold',
                        ])>
                           Finish
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
   
    
    var country="";
    document.querySelector('#country').addEventListener('change',()=>{
        getCountry();
        document.getElementById('st').value='';
    });
    function getCountry(){
       country=document.getElementById('country').value;
       if(country=="United States"){
        document.getElementById('state1').style.display="block";
        document.getElementById('state2').style.display="none"
        document.getElementById('state3').style.display="none"
       }
       else if(country=="Canada"){
        document.getElementById('state1').style.display="none";
        document.getElementById('state2').style.display="block"
        document.getElementById('state3').style.display="none"
       }
       else{
        document.getElementById('state1').style.display="none";
        document.getElementById('state2').style.display="none"
        document.getElementById('state3').style.display="block"
       }

    }
    // $("state1 #state2').on('change',function(){
    //    getState();
    // });
    if(document.getElementById('state1').value !=null){
        getState(document.getElementById('state1').value);
    }
    else if(document.getElementById('state2').value !=null){
        getState(document.getElementById('state2').value);
    }
    function getState(state){
        
        document.getElementById('st').value=state;
       
        
    }
   
    
     getCountry();
    function setState(){
        $('#state1').on('change',()=>{
            state=$('#state1').val();
            document.getElementById('st').value=state;
        });
        $('#state2').on('change',()=>{
            state=$('#state2').val();
            document.getElementById('st').value=state;
        })
        if($('#state2').val() !=null){
            getState($('#state2').val());
        }
        else if($('#state1').val() !=null){
            getState($('#state2').val());
        }
    }
    // function getCity(state){
    //     urls=document.getElementById('urls').value+"/"+state;
    //     console.log(state);
    //     $.ajax({
    //               type:"GET",
    //               url:urls,
    //               dataType:'json',
    //               success:function(data){ 
    //                 var len = 0;
    //                 if(data.cities != null){
    //                     len = data.cities.length;
    //                 }
    //                 console.log(len);
    //                 // if(len > 0){
    //                 //     // Read data and create <option >
    //                 //     for(var i=0; i<len; i++){

    //                 //         var id = response['data'][i].CityID;
    //                 //         var city = response['data'][i].city;

    //                 //         var option = "<option value='"+id+"'>"+city+"</option>";

    //                 //         $("#sel_cityd").append(option);
    //                 //     }
    //                 // }
    //                 console.log(data.cities);
    //                     },
    //               error:function(data){
    //                     console.log(data);
    //                     }
    //             });      
    //     }
</script>