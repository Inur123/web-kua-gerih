@extends('user.layouts.app')
@section('title', 'Visi Misi - Kua Gerih')
@section('content')
<main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Visi & Misi KUA</h1>

                 <!-- Visi  -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <div class="text-center mb-6">
                        <div class="bg-kemenag-green text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">👁️</span>
                        </div>
                        <h2 class="text-2xl font-bold text-kemenag-green">VISI</h2>
                    </div>
                    <div class="bg-gradient-to-r from-kemenag-green to-kemenag-light-green text-white p-6 rounded-lg text-center">
                        <p class="text-lg font-medium leading-relaxed">
                            "Terwujudnya KUA yang profesional, amanah, dan terpercaya dalam memberikan pelayanan prima kepada masyarakat di bidang urusan agama Islam"
                        </p>
                    </div>
                </div>

                 <!-- Misi  -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="text-center mb-6">
                        <div class="bg-kemenag-green text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">🎯</span>
                        </div>
                        <h2 class="text-2xl font-bold text-kemenag-green">MISI</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">1</span>
                                </div>
                                <p class="text-gray-700">Memberikan pelayanan administrasi nikah, rujuk, dan wakaf yang cepat, tepat, dan transparan</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">2</span>
                                </div>
                                <p class="text-gray-700">Meningkatkan kualitas SDM aparatur KUA melalui pendidikan dan pelatihan berkelanjutan</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">3</span>
                                </div>
                                <p class="text-gray-700">Mengembangkan sistem pelayanan berbasis teknologi informasi</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">4</span>
                                </div>
                                <p class="text-gray-700">Memberikan bimbingan dan penyuluhan agama kepada masyarakat</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">5</span>
                                </div>
                                <p class="text-gray-700">Membangun kemitraan dengan stakeholder untuk meningkatkan kualitas pelayanan</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-sm font-bold">6</span>
                                </div>
                                <p class="text-gray-700">Mewujudkan tata kelola pemerintahan yang bersih dan bebas dari korupsi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
