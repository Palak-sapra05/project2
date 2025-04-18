<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Drive - Technology</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .eco-btn {
    background-color: var(--primary);
    color: white !important;
    padding: 0.5rem 1.2rem !important;
    border-radius: 5px;
    margin-left: 1rem !important;
}
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            position: absolute;
            left: 2rem;
        }
        .back-btn {
            color: var(--text-dark);
            font-size: 1.2rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .back-btn:hover {
            color: var(--accent);
            transform: translateX(-3px);
        }
        .logo-text {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: 1px;
            
        }

    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
            <div class="logo-container">
                <a href="home.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
                <a href="home.php" class=" text-green-600 logo-text">Eco Drive</a>
            </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Vehicles</a>
                    <a href="#" class="text-green-600 border-b-2 border-green-600 px-3 py-2 text-sm font-medium">Technology</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Sustainability</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Shop</a>
                    <a href="donate.php" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">Donate</a>

                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-green-700 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-green-700 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <div class="pt-10 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
                    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                                <span class="block">Innovative</span>
                                <span class="block text-green-300">Green Technology</span>
                            </h1>
                            <p class="mt-3 text-base text-green-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Discover the cutting-edge technologies powering the future of sustainable transportation.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50 md:py-4 md:text-lg md:px-10">
                                        Learn more
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                                        Watch demo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Electric vehicle technology">
        </div>
    </div>

    <!-- Technology Features -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">Technologies</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Powering the Future of Mobility
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Our innovative technologies are designed to maximize efficiency and minimize environmental impact.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Battery Tech -->
                    <div class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-500 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div>
                            <span class="rounded-lg inline-flex p-3 bg-green-50 text-green-700 ring-4 ring-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Next-Gen Battery Systems
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Our proprietary battery technology delivers 30% more range and charges twice as fast as conventional systems.
                            </p>
                        </div>
                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-green-400" aria-hidden="true">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 002 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                            </svg>
                        </span>
                    </div>

                    <!-- Regenerative Braking -->
                    <div class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-500 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div>
                            <span class="rounded-lg inline-flex p-3 bg-green-50 text-green-700 ring-4 ring-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Smart Regenerative Braking
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Recapture up to 90% of kinetic energy during deceleration, extending your range with every stop.
                            </p>
                        </div>
                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-green-400" aria-hidden="true">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 002 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                            </svg>
                        </span>
                    </div>

                    <!-- AI Efficiency -->
                    <div class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-500 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div>
                            <span class="rounded-lg inline-flex p-3 bg-green-50 text-green-700 ring-4 ring-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    AI-Powered Efficiency
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Our adaptive AI learns your driving patterns to optimize energy usage and maximize your range.
                            </p>
                        </div>
                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-green-400" aria-hidden="true">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 002 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-green-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Trusted by eco-conscious drivers worldwide
                </h2>
                <p class="mt-3 text-xl text-green-200 sm:mt-4">
                    Our technology is making a real difference in reducing carbon emissions.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="pt-6">
                    <div class="flow-root bg-green-800 px-6 pb-8 rounded-lg h-full">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-green-600 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-white tracking-tight">500k+</h3>
                            <p class="mt-1 text-base text-green-200">Tons of CO₂ saved annually</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-green-800 px-6 pb-8 rounded-lg h-full">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-green-600 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-white tracking-tight">75%</h3>
                            <p class="mt-1 text-base text-green-200">More energy efficient than gas</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-green-800 px-6 pb-8 rounded-lg h-full">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-green-600 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-white tracking-tight">$1.2B</h3>
                            <p class="mt-1 text-base text-green-200">Saved on fuel costs</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-green-800 px-6 pb-8 rounded-lg h-full">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-green-600 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-white tracking-tight">1M+</h3>
                            <p class="mt-1 text-base text-green-200">Happy drivers worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to experience our technology?</span>
                <span class="block text-green-600">Join the green revolution today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                        Find a dealer
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <span class="text-white font-bold text-2xl">ECO DRIVE</span>
                    <p class="text-gray-300 text-base">
                        Driving innovation for a sustainable future.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041.058h-.08c-2.597 0-2.917-.01-3.96-.058-.976-.045-1.505-.207-1.858-.344-.466-.182-.8-.398-1.15-.748-.35-.35-.566-.683-.748-1.15-.137-.353-.3-.882-.344-1.857-.048-1.023-.058-1.351-.058-3.807v-.468zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Products</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Vehicles</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Technology</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Sustainability</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Shop</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Company</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">About</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Blog</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Careers</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Support</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Help Center</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Safety</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Community</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Legal</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Privacy</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Terms</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Cookie Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; 2023 Eco Drive, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>