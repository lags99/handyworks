<option disabled @if (Auth::user()->specialization == null) selected @endif value="">- Select</option>

<option @if (Auth::user()->specialization == "House Cleaning") selected @endif value="House Cleaning">House Cleaning</option>

<option  @if (Auth::user()->specialization == "Appliance Repair & Maintenance") selected @endif value="Appliance Repair & Maintenance">Appliance Repair & Maintenance</option>

<option  @if (Auth::user()->specialization == "Interior & Exterior House Painting") selected @endif value="Interior & Exterior House Painting">Interior & Exterior House Painting</option>

<option  @if (Auth::user()->specialization == "Electrical") selected @endif value="Electrical ">Electrical</option>

<option  @if (Auth::user()->specialization == "Roof Installation or Replacement") selected @endif value="Roof Installation or Replacement">Roof Installation or Replacement</option>

<option  @if (Auth::user()->specialization == "Floor Installation or Replacement") selected @endif value="Floor Installation or Replacement">Floor Installation or Replacement</option>

<option @if (Auth::user()->specialization == "Furniture Assembly") selected @endif value="Furniture Assembly">Furniture Assembly</option>

<option @if (Auth::user()->specialization == "Aircon Services") selected @endif value="Aircon Services">Aircon Services</option>

<option @if (Auth::user()->specialization == "Gardening") selected @endif value="Gardening">Gardening</option>

<option @if (Auth::user()->specialization == "Masonry") selected @endif value="Masonry ">Masonry</option>

<option @if (Auth::user()->specialization == "Home Sanitizing") selected @endif value="Home Sanitizing">Home Sanitizing</option>

<option @if (Auth::user()->specialization == "Car Sanitizingg") selected @endif value="Car Sanitizing">Car Sanitizing</option>

<option @if (Auth::user()->specialization == "Plumbing") selected @endif value="Plumbing">Plumbing</option>

<option @if (Auth::user()->specialization == "Hair Grooming") selected @endif value="Hair Grooming">Hair Grooming</option>

<option @if (Auth::user()->specialization == "Manicure / Pedicure") selected @endif value="Manicure / Pedicure">Manicure / Pedicure</option>

<option @if (Auth::user()->specialization == "Massaging") selected @endif value="Massaging">Massaging</option>

<option @if (Auth::user()->specialization == "Home Disinfection") selected @endif value="Home Disinfection">Home Disinfection</option>

<option @if (Auth::user()->specialization == "Car Disinfection") selected @endif value="Car Disinfection">Car Disinfection</option>

<option @if (Auth::user()->specialization == "PT Service") selected @endif value="PT Service">PT Service</option>

<option @if (Auth::user()->specialization == "Dog Grooming") selected @endif value="Dog Grooming">Dog Grooming</option>

<option @if (Auth::user()->specialization == "Driver") selected @endif value="Driver">Driver</option>

<option @if (Auth::user()->specialization == "Grease Cleaner") selected @endif value="Grease Cleaner">Grease Cleaner</option>

<option @if (Auth::user()->specialization == "Aircon Cleaner") selected @endif value="Aircon Cleaner">Aircon Cleaner</option>
