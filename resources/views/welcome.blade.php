

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <style>
        /* Hand-drawn wireframe vibe font */
        .handwritten {
            font-family: 'Architects Daughter', cursive;
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl w-full p-6">
        
        <!-- Left Box: Input Form -->
        <div class="bg-white border-2 border-black rounded-xl p-6 shadow-sm flex flex-col justify-between">
            <div>
                <!-- Title -->
                <h1 class="text-2xl font-bold mb-6 text-black handwritten">Unit Converter</h1>

                <!-- Tabs -->
             
<div class="flex space-x-6 mb-8 border-b border-gray-200 pb-2">

    <a href="{{ route('converter.show', ['type' => 'length']) }}"
       class="{{ $type === 'length' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Length
    </a>

    <a href="{{ route('converter.show', ['type' => 'weight']) }}"
       class="{{ $type === 'weight' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Weight
    </a>

    <a href="{{ route('converter.show', ['type' => 'temperature']) }}"
       class="{{ $type === 'temperature' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Temperature
    </a>

</div>


                <!-- Form -->
                <form action="{{ route('convert') }}" method="POST" class="space-y-6">
                    @csrf
                  

                     <input type="hidden" name="type" value="{{ $type }}">
                    <div>
                        <label class="block text-black font-medium mb-2 handwritten">Enter the length to convert</label>
                        <input type="number" name="input_value" step="any" required class="w-full border-2 border-black rounded-md px-3 py-2 focus:outline-none handwritten text-lg">
                    </div>

                   <div>
    <label class="block text-black font-medium mb-2 handwritten">Unit to Convert from</label>
   
<select name="from_unit"
        class="w-full border-2 border-black rounded-md px-3 py-2 bg-white"
        required>

    @if($type === 'length')
        <option value="m">Meter (m)</option>
        <option value="km">Kilometer (km)</option>
        <option value="cm">Centimeter (cm)</option>
        <option value="mm">Millimeter (mm)</option>

    @elseif($type === 'weight')
        <option value="kg">Kilogram (kg)</option>
        <option value="g">Gram (g)</option>
        <option value="mg">Milligram (mg)</option>
        <option value="lb">Pound (lb)</option>

    @elseif($type === 'temperature')
        <option value="c">Celsius (°C)</option>
        <option value="f">Fahrenheit (°F)</option>
        <option value="k">Kelvin (K)</option>
    @endif

</select>

</div>
<div>
    <label class="block text-black font-medium mb-2 handwritten">Unit to Convert to</label>
   
<select name="to_unit"
        class="w-full border-2 border-black rounded-md px-3 py-2 bg-white"
        required>

    @if($type === 'length')
        <option value="m">Meter (m)</option>
        <option value="km">Kilometer (km)</option>
        <option value="cm">Centimeter (cm)</option>
        <option value="mm">Millimeter (mm)</option>

    @elseif($type === 'weight')
        <option value="kg">Kilogram (kg)</option>
        <option value="g">Gram (g)</option>
        <option value="mg">Milligram (mg)</option>
        <option value="lb">Pound (lb)</option>

    @elseif($type === 'temperature')
        <option value="c">Celsius (°C)</option>
        <option value="f">Fahrenheit (°F)</option>
        <option value="k">Kelvin (K)</option>
    @endif

</select>

</div>

                    <div>
                        <button type="submit" class="border-2 border-black px-6 py-2 rounded-md font-bold hover:bg-black hover:text-white transition handwritten text-lg">
                            Convert
                        </button>
                    </div>
                </form>
            </div>
        </div>

         <!-- Right Box: Result View -->
        <div class="bg-white border-2 border-black rounded-xl p-6 shadow-sm flex flex-col justify-between">
            <div>
                <!-- Title -->
                <h1 class="text-2xl font-bold mb-6 text-black handwritten">Unit Converter</h1>

                <!-- Tabs -->
               
<div class="flex space-x-6 mb-8 border-b border-gray-200 pb-2">

    <a href="{{ route('converter.show', ['type' => 'length']) }}"
       class="{{ $type === 'length' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Length
    </a>

    <a href="{{ route('converter.show', ['type' => 'weight']) }}"
       class="{{ $type === 'weight' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Weight
    </a>

    <a href="{{ route('converter.show', ['type' => 'temperature']) }}"
       class="{{ $type === 'temperature' ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }} border-b-2 pb-1 handwritten text-lg font-bold">
        Temperature
    </a>

</div>


                <!-- Result Section -->
                <div class="my-10">
                    <p class="text-black font-medium mb-2 handwritten">Result of your calculation</p>
                    <div class="text-4xl font-bold text-black handwritten">
                        
                        @if(session('converted_value'))
                        <div class="text-4xl font-bold text-black handwritten">
                          Result: {{ session('converted_value') }}
                          {{ session('to_unit') }}
                         </div>


        <p class="mt-3 text-gray-600 handwritten">
            {{ session('original_value') }}
            {{ session('from_unit') }}
            =
            {{ session('converted_value') }}
            {{ session('to_unit') }}

                        @endif
                    </div>
                </div>

                <!-- Reset Button -->
                <div>
                    <a href="#" class="inline-block border-2 border-black px-6 py-2 rounded-md font-bold hover:bg-black hover:text-white transition handwritten text-lg">
                        Reset
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>