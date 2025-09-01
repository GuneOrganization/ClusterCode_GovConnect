<div class="justify-center px-4 py-8 ">
    <div id="service-guide-content" class="content-section">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center">SERVICE GUIDE</h2>
            <div class="w-32 h-0.5 bg-black mx-auto mt-2"></div>
        </div>


        <div class="flex flex-col md:flex-row gap-3 mb-6 justify-center">
            <div class="w-full md:w-80">
                <div class="relative">
                    <input type="text" placeholder="SEARCH"
                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 text-sm">
                    <button
                        class="absolute right-0 top-0 bottom-0 bg-gray-800 text-white px-4 rounded-r-lg hover:bg-gray-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- <div class="relative w-full md:w-auto">
                <select
                    class="w-full py-3 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 text-sm bg-white appearance-none cursor-pointer ">
                    <option>CIVIL REGISTRATION DEPARTMENT</option>
                    <option>Department of Motor Traffic</option>
                    <option>Immigration Department</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div> -->
        </div>

        <div class="space-y-4 serviceSelect">
            <!-- Service Item -->
            <!-- <div class="bg-stone-200 rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="sm:basis-2/3">
                        <h5 class="font-semibold text-gray-800 mb-3 text-lg">
                            Apply for New National ID Card
                        </h5>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Guidelines and requirements for obtaining a new National Identity Card,
                            including necessary documents, eligibility criteria, and application procedures.
                        </p>
                        <div class="flex flex-col sm:flex-row sm:gap-8 gap-2 text-sm text-gray-600">
                            <span><strong>Department:</strong> Civil Registration Department</span>
                            <span><strong>Last Updated:</strong> 2022.03.25</span>
                        </div>
                    </div>
                    <div class="sm:basis-1/3 flex sm:justify-end">
                        <button
                            class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg font-medium text-sm transition-colors duration-200 w-full sm:w-auto">
                            VIEW GUIDE
                        </button>
                    </div>
                </div>
            </div> -->


            <!-- <div class="bg-stone-200 rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="sm:basis-2/3">
                        <h5 class="font-semibold text-gray-800 mb-3 text-lg">
                            Apply for New National ID Card
                        </h5>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Guidelines and requirements for obtaining a new National Identity Card,
                            including necessary documents, eligibility criteria, and application procedures.
                        </p>
                        <div class="flex flex-col sm:flex-row sm:gap-8 gap-2 text-sm text-gray-600">
                            <span><strong>Department:</strong> Civil Registration Department</span>
                            <span><strong>Last Updated:</strong> 2022.03.25</span>
                        </div>
                    </div>
                    <div class="sm:basis-1/3 flex sm:justify-end">
                        <button
                            class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg font-medium text-sm transition-colors duration-200 w-full sm:w-auto">
                            VIEW GUIDE
                        </button>
                    </div>
                </div>
            </div> -->

           
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const deptSelect = document.querySelector("select");
        const searchInput = document.querySelector("input[type='text']");
        const serviceContainer = document.querySelector(".serviceSelect");

        
        function loadServices(search = "", departmentId = "") {
            fetch(`backend/getServices.php?search=${encodeURIComponent(search)}&department_id=${departmentId}`)
                .then(res => res.json())
                .then(data => {
                    serviceContainer.innerHTML = "";
                    if (data.length === 0) {
                        serviceContainer.innerHTML = `<p class="text-gray-500 text-center">No services found.</p>`;
                        return;
                    }
                    data.forEach(service => {
                        serviceContainer.innerHTML += `
                            <div class="bg-stone-200 rounded-xl shadow-sm border border-gray-200 p-6">
                                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                    <div class="sm:basis-2/3">
                                        <h5 class="font-semibold text-gray-800 mb-3 text-lg">${service.title}</h5>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4">${service.description}</p>
                                        <div class="flex flex-col sm:flex-row sm:gap-8 gap-2 text-sm text-gray-600">
                                            <span><strong>Department:</strong> ${service.department_name}</span>
                                        </div>
                                    </div>
                                    <div class="sm:basis-1/3 flex sm:justify-end">
                                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg font-medium text-sm transition-colors duration-200 w-full sm:w-auto">
                                            VIEW GUIDE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                })
                .catch(err => {
                    console.error("Error loading services:", err);
                    serviceContainer.innerHTML = `<p class="text-red-500 text-center">Failed to load services.</p>`;
                });
        }

        loadServices();

        searchInput.addEventListener("input", (e) => {
            loadServices(e.target.value, deptSelect.value);
        });

        deptSelect.addEventListener("change", (e) => {
            console.log(searchInput.value, e.target.value);
            loadServices(searchInput.value, e.target.value);
        });
    });
</script>
