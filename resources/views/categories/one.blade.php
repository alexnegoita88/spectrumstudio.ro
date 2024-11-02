@extends('_layouts.app')

@section('title', ucfirst($category->name))

@section('content')


<section class="container max-w-6xl mx-auto p-6">

    <!-- Main Flex Container -->
    <div class="flex flex-wrap lg:flex-nowrap gap-6">

        <!-- Sidebar -->
        <aside class="w-full lg:w-1/4 p-6">
            <h2 class="text-xl font-bold mb-4 text-gray-700">Categorii Produse</h2>
            <ul class="space-y-3 list-disc list-inside">
                @foreach ($categories as $cat)
                    {{-- Parent Category --}}
                    @if (is_null($cat->parent_id))
                        <li>
                            <a href="{{ route('category', $cat->slug) }}" 
                            class="text-gray-500 hover:text-gray-800
                            {{ $category->slug == $cat->slug ? 'text-blue-600 font-bold' : '' }}">
                            {{-- Highlight the current category --}}
                            {{ ucfirst($cat->name) }}
                            </a>
                            
                            {{-- Child Categories --}}
                            @if ($cat->children->isNotEmpty())
                                <ul class="ml-4 mt-2 space-y-1 list-disc list-inside">
                                    @foreach ($cat->children as $child)
                                        <li>
                                            <a href="{{ route('category', $child->slug) }}" 
                                            class="text-gray-500 hover:text-gray-800
                                            {{ $category->slug == $child->slug ? 'text-blue-600 font-bold' : '' }}">
                                            {{-- Highlight the current child category --}}
                                            {{ ucfirst($child->name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </aside>

        <!-- Product Cards Section -->
        <div class="w-full lg:w-3/4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Produsele noastre</h1>

            <!-- Results Counter and Sorting Select Box -->
            <div class="mb-6 flex justify-between items-center">
                <!-- Results Counter -->
                @if($products->total() > 0)
                    <div class="text-gray-600 font-medium">
                        Afiseaza {{ $products->firstItem() }} - {{ $products->lastItem() }} din {{ $products->total() }} articole
                    </div>


                <!-- Sorting Select Box -->
                <form id="sort-form" action="{{ route('category', $category->slug) }}" method="GET" class="flex items-center">
                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                    <select name="sort" class="orderby text-gray-600 bg-gray-100 border border-gray-300 rounded-lg px-4 py-2" aria-label="Sort products" onchange="this.form.submit()">
                        <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Sorteaza dupa cele mai noi</option>
                        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Sorteaza dupa cele mai vechi</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sorteaza dupa nume</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Sorteaza dupa pret ascendent</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Sorteaza dupa pret descendent</option>
                    </select>
                </form>
                @endif
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-sm shadow-sm p-4">
                            <img src="{{ url(Storage::url($product->pictures[0])) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover rounded-sm mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ ucfirst($product->name) }}</h3>
                            <a href="{{ route('product', $product->slug) }}" class="w-full text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">Vezi detalii</a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-6 flex justify-between items-center">
                    {{-- Previous Page Button --}}
                    @if ($products->onFirstPage())
                        <span class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 rounded-lg inline-block my-10 cursor-not-allowed">Previous</span>
                    @else
                        <a href="{{ $products->appends(request()->except('page'))->previousPageUrl() }}" 
                        class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">Previous</a>
                    @endif
                    
                    {{-- Page Number Buttons --}}
                    <div class="flex space-x-2">
                        @for ($page = 1; $page <= $products->lastPage(); $page++)
                            @if ($page == $products->currentPage())
                                <span class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 rounded-lg inline-block my-10">{{ $page }}</span>
                            @else
                                <a href="{{ $products->appends(request()->except('page'))->url($page) }}" 
                                class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">{{ $page }}</a>
                            @endif
                        @endfor
                    </div>

                    {{-- Next Page Button --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->appends(request()->except('page'))->nextPageUrl() }}" 
                        class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">Next</a>
                    @else
                        <span class="text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 rounded-lg inline-block my-10 cursor-not-allowed">Next</span>
                    @endif
                </div>
            @else
                <div class="text-lg font-semibold">
                    <h4>Ooops... Momentan nu sunt produse in aceasta categorie.</h4>
                </div>
            @endif
            
        </div>
        
    </div>

</section>

@endsection
