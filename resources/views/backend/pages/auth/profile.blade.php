<!doctype html>
<html lang="en">

<head>
    @include('backend.layout.header')
    <title>User Login</title>
</head>

<body>

    <!--sidebar wrapper -->
    @include('backend.layout.sidebar')


    <!--start top bar -->
    @include('backend.layout.topbar')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container-fluid">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ asset($user->profile_Photo) }}" alt="Admin"
                                            class="rounded-circle p-1 bg-primary" height="130" width="130">
                                        <div class="mt-3">
                                            <h4 class="text-capitalized">{{ $user->name }}</h4>
                                            <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-globe me-2 icon-inline">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="2" y1="12" x2="22" y2="12">
                                                    </line>
                                                    <path
                                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                    </path>
                                                </svg>Website
                                            </h6>
                                            <span class="text-secondary">{{ $userProfile->website }}</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-github me-2 icon-inline">
                                                    <path
                                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                    </path>
                                                </svg>Github</h6>
                                            <span class="text-secondary">{{ $userProfile->github_url }}</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-twitter me-2 icon-inline text-info">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg>Twitter</h6>
                                            <span class="text-secondary">{{ $userProfile->twitter_url }}</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-instagram me-2 icon-inline text-danger">
                                                    <rect x="2" y="2" width="20" height="20" rx="5"
                                                        ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5">
                                                    </line>
                                                </svg>Instagram</h6>
                                            <span class="text-secondary">{{ $userProfile->instagram_url }}</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-facebook me-2 icon-inline text-primary">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg>Facebook</h6>
                                            <span class="text-secondary">{{ $userProfile->facebook_url }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{ route('profile.update') }}"
                                        class="mt-6 space-y-6" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name', $user->name) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control"
                                                    value="{{ old('email', $user->email) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Profile Picture</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" class="form-control" name="picture" />
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h6 class="col-sm-3 text-capitalized">old Image</h6>
                                                <div class="col-sm-9 mx-2 mt-2">
                                                    <img @if (Auth::user()->profile_Photo) src="{{ asset(Auth::user()->profile_Photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                                        width="150" height="180" class="img-fluid rounded">
                                                </div>
                                                {{-- <img @if ($item->image) src="{{ asset($item->image) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                                    width="100" alt=""> --}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4"
                                                    value="Save Changes" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Social Url --->

                            <div class="d-flex gap-2">
                                <!-- Toggle Button -->
                                <button type="button" id="SocialToggleBtn" class="btn btn-primary mb-3">
                                    Change Social
                                </button>

                                <!-- Toggle Button -->
                                <button type="button" id="passwordToggleBtn" class="btn btn-primary mb-3">
                                    Change Password
                                </button>
                            </div>

                            <!-- Social Change Card -->
                            <div id="SocialCard" class="card" style="display:none;">
                                <div class="card-header">
                                    <h4 class="card-title">Social Change</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Website</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="website"
                                                    placeholder="Ex:Website Link"
                                                    value="{{ old('website', $userProfile->website) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Github Profile Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="github_url"
                                                    placeholder="Ex:Github Link"
                                                    value="{{ old('github_url', $userProfile->github_url) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Facebook Profile Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="facebook_url"
                                                    placeholder="Ex:Facebook Link"
                                                    value="{{ old('facebook_url', $userProfile->facebook_url) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Twitter Profile Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="twitter_url"
                                                    placeholder="Ex:Twitter Link"
                                                    value="{{ old('twitter_url', $userProfile->twitter_url) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Linkedin Profile Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="linkedin_url"
                                                    placeholder="Ex:Linkedin Link"
                                                    value="{{ old('linkedin_url', $userProfile->linkedin_url) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Instagram Profile Link</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="instagram_url"
                                                    placeholder="Ex:Instagram Link"
                                                    value="{{ old('instagram_url', $userProfile->instagram_url) }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4"
                                                    value="Save Changes" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Social Change Card End -->

                            <!-- Password Change Card -->
                            <div id="passwordCard" class="card" style="display:none;">
                                <div class="card-header">
                                    <h4 class="card-title">Password Change</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control" name="oldPassword"
                                                value="{{ old('oldPassword') }}" placeholder="Enter Old Password" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control" name="newPassword"
                                                value="{{ old('newPassword') }}" placeholder="Enter New Password" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="button" class="btn btn-primary px-4"
                                                value="Update Password Changes" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Password Change Card End  -->

                        </div>

                        <!-- Social Url End --->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end page wrapper -->

    @include('backend.layout.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Password Change
            const btn = document.getElementById("passwordToggleBtn");
            const card = document.getElementById("passwordCard");

            btn.addEventListener("click", function() {
                if (card.style.display === "none") {
                    card.style.display = "block";
                    btn.textContent = "Hide Password"; // Button text পরিবর্তন হবে
                } else {
                    card.style.display = "none";
                    btn.textContent = "Show Password";
                }
            });

            // Social URl
            const socialBtn = document.getElementById("SocialToggleBtn");
            const SocialCard = document.getElementById("SocialCard");

            socialBtn.addEventListener("click", function() {
                if (SocialCard.style.display === "none") {
                    SocialCard.style.display = "block";
                    socialBtn.textContent = "Hide BTN"; // Button text পরিবর্তন হবে
                } else {
                    SocialCard.style.display = "none";
                    socialBtn.textContent = "Show BTN";
                }
            });

        });
    </script>
</body>

</html>
