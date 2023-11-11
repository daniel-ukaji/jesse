<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-10 col-md-10 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-4">
                <h3>Edit your matching preferences</h3>
                <p class="m-0">
                    - "<b>N/A</b>" signifies that you may have selected a neutral option when filling out your
                    preference
                    form
                </p>
                <p>
                    - <span class="text-danger">Remember</span> to fill out what you seek in you soulmate.
                </p>
            </div>
            <hr>
            <form method="POST" action="{{ route('seeks.update', $seeks) }}" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PATCH')

                {{-- gender --}}
                <div class="col-md-6">
                    <label for="gender" class="form-label fw-bold">Their gender <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="gender" name="gender"
                        required>
                        <option value="{{ $seeks->gender }}" selected disabled>
                            {{ $seeks->gender ? $seeks->gender : __('Choose an option') }}
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                {{-- sexual orientation --}}
                <div class="col-md-6">
                    <label for="sexual_orientation" class="form-label fw-bold">
                        Their sexual orientation
                        <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="sexual_orientation"
                        name="sexual_orientation" required>
                        <option value="{{ $seeks->sexual_orientation }}" selected disabled>
                            {{ $seeks->sexual_orientation ? $seeks->sexual_orientation : __('Choose an option') }}
                        </option>
                        <option value="Heterosexual">Heterosexual</option>
                        <option value="Lesbian">Lesbian</option>
                        <option value="Gay">Gay</option>
                        <option value="Bisexual">Bisexual</option>
                    </select>
                </div>

                {{-- height --}}
                <div class="col-md-6">
                    <label for="height" class="form-label fw-bold">Their height</label>
                    <select class="form-select" aria-label="Default select example" id="height" name="height"
                        value="{{ old('height') }}">
                        <option value="{{ $seeks->height }}" selected disabled>
                            {{ $seeks->height ? $seeks->height : __('Choose an option') }}
                        </option>
                        <option value="4ft - 4'5ft">4ft - 4'5ft</option>
                        <option value="4'6ft - 5'5ft">4'6ft - 5'5ft</option>
                        <option value="5'5ft - 6ft">5'5ft - 6ft</option>
                        <option value="6ft - 6'5ft">6ft - 6'5ft</option>
                        <option value="6'5 above">6'5 above</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- body type --}}
                <div class="col-md-6">
                    <label for="body_type" class="form-label fw-bold">Their body type</label>
                    <select class="form-select" aria-label="Default select example" id="body_type" name="body_type">
                        <option value="{{ $seeks->body_type }}" selected disabled>
                            {{ $seeks->body_type ? $seeks->body_type : __('Choose an option') }}
                        </option>
                        <option value="Slim">Slim</option>
                        <option value="Petite">Petite</option>
                        <option value="Muscular">Muscular</option>
                        <option value="Chubby">Chubby</option>
                        <option value="Fat">Fat</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- hair color --}}
                <div class="col-md-6">
                    <label for="hair_color" class="form-label fw-bold">Their Hair color</label>
                    <select class="form-select" aria-label="Default select example" id="hair_color" name="hair_color">
                        <option value="{{ $seeks->hair_color }}" selected disabled>
                            {{ $seeks->hair_color ? $seeks->hair_color : __('Choose an option') }}
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brunet">Brunet</option>
                        <option value="Blonde">Blonde</option>
                        <option value="Red">Red</option>
                        <option value="N/A" class="text-danger">I don't mind</option>

                    </select>
                </div>

                {{-- eye color --}}
                <div class="col-md-6">
                    <label for="eye_color" class="form-label fw-bold">Their Eye color</label>
                    <select class="form-select" aria-label="Default select example" id="eye_color" name="eye_color">
                        <option value="{{ $seeks->eye_color }}" selected disabled>
                            {{ $seeks->eye_color ? $seeks->eye_color : __('Choose an option') }}
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brown">Brown</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                        <option value="Hazel">Hazel</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- physically active --}}
                <div class="col-md-6">
                    <label for="how_pa" class="form-label fw-bold"
                        title="How physically active do you want your partner to be">Activity level</label>
                    <select class="form-select" aria-label="Default select example" id="how_pa" name="how_pa">
                        <option value="{{ $seeks->how_pa }}" selected disabled>
                            {{ $seeks->how_pa ? $seeks->how_pa : __('Choose an option') }}
                        </option>
                        <option value="Once a year">Once a year</option>
                        <option value="A couple times a week">A couple times a week</option>
                        <option value="Daily fitness">Daily fitness</option>
                        <option value="Couch potato">I don't mind a couch potato</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- education --}}
                <div class="col-md-6">
                    <label for="education" class="form-label fw-bold"
                        title="What level of education would you like them to have">Education <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="education" name="education"
                        required>
                        <option value="{{ $seeks->education }}" selected disabled>
                            {{ $seeks->education ? $seeks->education : __('Choose an option') }}
                        </option>
                        <option value="Some college">Some college</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="Masters">Masters</option>
                        <option value="Post-graduate">Post-graduate</option>
                        <option value="N/A" class="text-danger">I don't mind</option>

                    </select>
                </div>

                {{-- What they're looking for --}}
                <div class="col-md-6">
                    <label for="rel_type" class="form-label fw-bold"
                        title="What kind of relationship do you expect your partner to be searching for ?">What they
                        seek <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="rel_type" name="rel_type"
                        required>
                        <option value="{{ $seeks->rel_type }}" selected disabled>
                            {{ $seeks->rel_type ? $seeks->rel_type : __('Choose an option') }}
                        </option>
                        <option value="Marriage">Someone looking for Marriage</option>
                        <option value="Platonic relationship">Someone looking for a platonic relationship</option>
                        <option value="Hang out buddy">Hangout buddy</option>
                        <option value="Friends with benefit">Friends with benefit</option>
                        <option value="N/A" class="text-danger">Not sure</option>
                    </select>
                </div>

                {{-- how_jelly --}}
                <div class="col-md-6">
                    <label for="how_jelly" class="form-label fw-bold">Do you want an obsessive partner ?</label>
                    <select class="form-select" aria-label="Default select example" id="how_jelly" name="how_jelly">
                        <option value="{{ $seeks->how_jelly }}" selected disabled>
                            {{ $seeks->how_jelly ? $seeks->how_jelly : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
              
                {{-- ethnicity --}}
                <div class="col-md-12">
                    <label for="ethnicity" class="form-label fw-bold">Ethnicity</label>
                    <select class="form-select" aria-label="Default select example" id="ethnicity" name="ethnicity" >
                        <option value="{{ $seeks->ethnicity }}" selected disabled >
                            {{ $seeks->ethnicity ? $seeks->ethnicity : __('Choose an option') }}
                        </option>
                        <option value="White/Caucasian" >White/Caucasian</option>
                        <option value="Asian">Asian</option>
                        <option value="African">African</option>
                        <option value="Latinos">Latino/Hispanic</option>
                        <option value="Middle Eastern/Arab">Middle Eastern/Arab</option>
                        <option value="Mixed/Multiracial">Mixed/Multiracial</option>
                        <option value="Other">Other</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>
                @php
                $religions=explode(',',$seeks->religion);
                $states=explode(',',$seeks->state);
            @endphp
                {{-- religion --}}
                <div class="col-md-12">
                    <label for="religion" class="form-label fw-bold">Their Religion</label>
                    <select class="form-select" aria-label="Default select example" id="religion" name="religion[]"
                        required multiple>
                        {{-- <option value="{{ $seeks->religion }}" selected disabled>
                         {{ $seeks->religion ? $seeks->religion : __('Choose an option') }}
                         </option> --}}
                        <option value="Muslim" @foreach($religions as $key => $religion) @if($religion=="Muslim") selected @endif @endforeach>Muslim</option>
                        <option value="Christian" @foreach($religions as $key => $religion) @if($religion=="Christian") selected @endif @endforeach>Christian</option>
                        <option value="Jewish" @foreach($religions as $key => $religion) @if($religion=="Jewish") selected @endif @endforeach>Jewish</option>
                        <option value="Hindu"  @foreach($religions as $key => $religion) @if($religion=="Hindu") selected @endif @endforeach>Hindu</option>
                        <option value="Buddhist"  @foreach($religions as $key => $religion) @if($religion=="Buddhist") selected @endif @endforeach>Buddhist</option>
                        <option value="Agnostic"  @foreach($religions as $key => $religion) @if($religion=="Agnostic") selected @endif @endforeach>Agnostic</option>
                        <option value="Atheist"  @foreach($religions as $key => $religion) @if($religion=="Atheist") selected @endif @endforeach>Atheist</option>
                        <option value="N/A" class="text-danger"  @foreach($religions as $key => $religion) @if($religion=="N/A") selected @endif @endforeach>I don't mind</option>
                    </select>
                </div>

                {{-- zodiac  --}}
                <div class="col-md-6">
                    <label for="zodiac_sign" class="form-label fw-bold">Their zodiac sign</label>
                    <select class="form-select" aria-label="Default select example" id="zodiac_sign"
                        name="zodiac_sign">
                        <option value="{{ $seeks->zodiac_sign }}" selected disabled>
                            {{ $seeks->zodiac_sign ? $seeks->zodiac_sign : __('Choose an option') }}
                        </option>
                        <option value="Capricon">Capricon</option>
                        <option value="Libra">Libra</option>
                        <option value="Sagittarius">Sagittarius</option>
                        <option value="Cancer">Cancer</option>
                        <option value="Gemini">Gemini</option>
                        <option value="Leo">Leo</option>
                        <option value="Aquarius">Aquarius</option>
                        <option value="Taurus">Taurus</option>
                        <option value="Pisces">Pisces</option>
                        <option value="Virgo">Virgo</option>
                        <option value="Aries">Aries</option>
                        <option value="Scorpio">Scorpio</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- children --}}
                <div class="col-md-6">
                    <label for="children" class="form-label fw-bold"
                        title="Do you mind a partner with children?">Children? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="children" name="children"
                        required>
                        <option value="{{ $seeks->children }}" selected disabled>
                            {{ $seeks->children ? $seeks->children : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="Yes, independent">Yes, if they're on their own</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date pet owner --}}
                <div class="col-md-6">
                    <label for="date_pet_owner" class="form-label fw-bold">Can you date a pet owner? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="date_pet_owner"
                        name="date_pet_owner" required>
                        <option value="{{ $seeks->date_pet_owner }}" selected disabled>
                            {{ $seeks->date_pet_owner ? $seeks->date_pet_owner : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date drug doer --}}
                <div class="col-md-6">
                    <label for="date_drug" class="form-label fw-bold">
                        Can you date someone who does drugs ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_drug" name="date_drug"
                        required>
                        <option value="{{ $seeks->date_drug }}" selected disabled>
                            {{ $seeks->date_drug ? $seeks->date_drug : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date drinker --}}
                <div class="col-md-6">
                    <label for="date_drink" class="form-label fw-bold">
                        Can you date someone who drinks ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_drink"
                        name="date_drink" required>
                        <option value="{{ $seeks->date_drink }}" selected disabled>
                            {{ $seeks->date_drink ? $seeks->date_drink : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date smoker --}}
                <div class="col-md-6">
                    <label for="date_smoker" class="form-label fw-bold">
                        Can you date someone who smokes ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_smoker"
                        name="date_smoker" required>
                        <option value="{{ $seeks->date_smoker }}" selected disabled>
                            {{ $seeks->date_smoker ? $seeks->date_smoker : __('Choose an option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- country --}}
                <div class="col-md-12">
                    <label for="country" class="form-label fw-bold">
                        Country <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="country" name="country"
                        required>
                        <option value="{{ $seeks->country }}" selected disabled>
                            {{ $seeks->country ? $seeks->country : __('Choose an option') }}
                        </option>
                        <option value="Canada">Canada</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label fw-bold">State <b
                            class="text-danger">*</b></label>
                            <input type="text" name="state" id="st" multiple hidden>
                    <select class="form-select" aria-label="Default select example" onchange="getState(this.value)" id="state1" 
                       multiple>
                       
                        @foreach($usas as $us)
                        <option value="{{$us->StateID}}"  @foreach($states as $key => $state) @if($state==$us->StateID) selected @endif @endforeach>{{$us->name}} @foreach($states as $key => $state) @if($state==$us->StateID)  •  @endif @endforeach</option>
                        @endforeach
                    </select>
                    <select class="form-select"  onchange="getState(this.value)"  aria-label="Default select example" id="state2" 
                        multiple>
                        {{-- <option value="{{ $seeks->state }}" selected disabled>
                            {{ $seeks->state ? $seeks->state . __(' • ') : __('Select State') }}
                        </option> --}}
                        @foreach($canadas as $canada)
                        <option value="{{$canada->StateID}}" @foreach($states as $key => $state) @if($state==$canada->StateID) selected @endif @endforeach>{{$canada->name}}</option>
                        @endforeach
                    </select>
                    <select class="form-select" aria-label="Default select example" id="state3" name=""
                        >
                        <option selected>Select State</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label fw-bold">
                        Age <b class="text-danger"></b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="age" name="age"
                        autocomplete="on" required>
                        <option value="{{ $seeks->age }}" selected disabled>
                            {{ $seeks->age ? str_replace(',','-',$seeks->age) : __('Choose an option') }}
                        </option>
                        <option value="18,25">18 - 25</option>
                        <option value="26,35">26 - 35</option>
                        <option value="36,45">36 - 45</option>
                        <option value="46,55">46 - 55</option>
                        <option value="56,65">56 - 65</option>
                        <option value="66,75">66 - 75</option>
                        <option value="76,130"> 76+ </option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>
                <div class="mt-4 d-flex align-item-center justify-content-between">
                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary shadow fw-bold">Back</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success shadow fw-bold">Done & Save</button>
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
        $('#state1').on('change',()=>{
            state=$('#state1').val();
            document.getElementById('st').value=state;
        });
        $('#state2').on('change',()=>{
            state=$('#state2').val();
            document.getElementById('st').value=state;
        })
    
     getCountry();
    function setState(){
        
        if($('#state2').val().length !=0){
            
            getState([$('#state2').val()]);
        }
        else if($('#state1').val().length !=0){
            
            getState($('#state1').val());
        }
    }
setState();

</script>