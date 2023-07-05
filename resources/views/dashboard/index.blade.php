@extends('layouts.app')

@section('title', 'Dashboard')

@section('css_after')
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.css">--}}
    <style>

    </style>
@endsection

@section('content')
    <div class="mx-8">
        <div id="progress_bar" class="flex justify-center center drop-shadow-md bg-white p-2 rounded">
            <div class="px-4 flex justify-between w-2/5">
                <div id="progressbarContainer" class="my-auto flex flex-cols items-center gap-4"></div>
            </div>
            <div style="width: 2rem; border-right: 1px solid #ccc; margin-right: 1.5rem;"></div>
            <div class="px-4 w-2/5">
                <div style="max-height: 3rem; overflow-y: auto;">
                    <table width="100%">
                        <tr>
                            <td><a href="#">English</a></td>
                            <td align="end">In 2 days</td>
                        </tr>
                        <tr>
                            <td><a href="#">Biology</a></td>
                            <td align="end">In 3 days</td>
                        </tr>
                        <tr>
                            <td><a href="#">Basic Programming Lorem Ipsum Mad</a></td>
                            <td align="end">In 3 days</td>
                        </tr>
                        <tr>
                            <td><a href="#">Basic Programming</a></td>
                            <td align="end">In 3 days</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <div id="deadlines_tabs" class="flex flex-col mt-4" style="width: 48%">
                <div class="tabs">
                    <div class="text-sm font-medium text-center border-b">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                            <li
                                class="mr-2 hover:rounded-t-md hover:text-gray-600 hover:bg-gray-100 transition ease-in-out">
                                <a id="events" href="#" data-url="calendar/events" data-tab="events"
                                   aria-current="page"
                                   class="inline-block p-4 rounded-t-md bg-gray-200 text-black active">
                                    Upcoming Events
                                </a>
                            </li>
                            <li
                                class="mr-2 hover:rounded-t-md hover:text-gray-600 hover:bg-gray-100 transition ease-in-out">
                                <a id="deadlines" href="#" data-url="calendar/deadlines" data-tab="deadlines"
                                   class="inline-block p-4 rounded-t-md">
                                    Upcoming Deadlines
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content border border-stone-300 drop-shadow-md bg-white"
                     style="height: 24.7rem; overflow-y: auto;">
                    <div id="tab-content" class="tab-pane active">
                        {{-- tab content --}}
                        <div class="tab-content-inner" style="overflow-y: auto;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script id="assignment_progress">
        var progressBar = new ProgressBar.Line("#progressbarContainer", {
            strokeWidth: 4,
            easing: 'easeInOut',
            duration: 1400,
            color: '#2E4F4F',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {
                width: '100%',
                height: '30%'
            },
            text: {
                style: {
                    color: '#999',
                    padding: 0,
                    margin: 0,
                    width: '3rem',
                    transform: null,
                },
                id: 'progressbar_percentage',
                autoStyleContainer: false
            },
            from: {
                color: '#FFEA82'
            },
            to: {
                color: '#ED6A5A'
            },
            step: function (state, progressBar) {
                progressBar.setText(Math.round(progressBar.value() * 100) + ' %');
            }
        });

        var totalAssignments = 7;
        var completedAssignments = 5;

        var progress = completedAssignments / totalAssignments;

        progressBar.animate(progress);
    </script>
    <script id="tippy">
        tippy('.progressbar-text', {
            content: '5/7 assignments completed!',
        });
    </script>
    <script id="tabs">
        document.addEventListener('DOMContentLoaded', function () {
            // CSS template for the 'active' class
            const activeClassTemplate = `
                color: black !important;
                background-color: #E5E7EB !important;
            `;

            // CSS template for the 'inactive' class
            const inactiveClassTemplate = `
                color: gray !important;
                background-color: transparent !important;
            `;

            // Function to make AJAX requests and display content
            function fetchData(url, callback) {
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        callback(data);
                    });
            }

            // Function to handle tab switching
            function switchTab(event) {
                event.preventDefault();

                const clickedTab = event.target;
                if (clickedTab.tagName === 'A') {
                    const tabLinks = document.querySelectorAll('.tabs a');
                    const tabPanes = document.querySelectorAll('.tab-content .tab-pane');
                    tabLinks.forEach(link => {
                        link.classList.remove('active');
                        link.style.cssText = inactiveClassTemplate;
                    });
                    tabPanes.forEach(pane => pane.classList.remove('active'));

                    clickedTab.classList.add('active');
                    clickedTab.style.cssText = activeClassTemplate;
                    const tabId = clickedTab.getAttribute('data-tab');
                    const tabPane = document.getElementById(tabId);

                    if (tabPane) {
                        tabPane.classList.add('active');
                        const url = clickedTab.getAttribute('data-url');
                        const baseUrl = window.location.origin; // Get the base URL dynamically
                        fetchData(`${baseUrl}/${url}`, function (response) {
                            // Update tab content with fetched data
                            const tabContent = document.querySelector('#tab-content .tab-content-inner');
                            if (tabContent) {
                                tabContent.innerHTML = response;
                            }
                        });
                    }
                }
            }

            // Add event listener to the parent element of tab links
            const tabContainer = document.querySelector('.tabs');
            tabContainer.addEventListener('click', switchTab);

            // Set the initial active tab if found
            const initialTab = document.querySelector('.tabs a.active');
            if (initialTab) {
                initialTab.classList.add('active');
                initialTab.style.cssText = activeClassTemplate;
                const initialUrl = initialTab.getAttribute('data-url');
                const baseUrl = window.location.origin; // Get the base URL dynamically
                console.log(`${baseUrl}/${initialUrl}`)
                fetchData(`${baseUrl}/${initialUrl}`, function (response) {
                    // Update tab content with fetched data
                    const tabContent = document.querySelector('#tab-content .tab-content-inner');
                    if (tabContent) {
                        tabContent.innerHTML = response;
                    }
                });
            }

            // Apply the active/inactive CSS classes based on the 'active' state
            const tabLinks = document.querySelectorAll('.tabs a');
            tabLinks.forEach(link => {
                link.classList.toggle('active', link.classList.contains('active'));
                link.style.cssText = link.classList.contains('active') ? activeClassTemplate :
                    inactiveClassTemplate;
            });
        });
    </script>
@endsection
