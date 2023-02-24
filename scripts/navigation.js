let darkMode = localStorage.getItem('dark_theme');

const darkModeToggle = document.querySelector('#lightdark_mode');

const enableDarkMode = () => {
    // 1. Add the class to the body
    document.body.classList.add('dark_theme');

    // 2. Update darkMode in localStorage
    localStorage.setItem('dark_theme', 'enabled');
    
    // 3. Set icons to dark icons
    nav_collection.src = nav_collection_icon_darkmode;
    nav_faq.src = nav_faq_icon_darkmode;
    nav_home.src = nav_home_icon_darkmode;
    nav_search.src = nav_search_icon_darkmode;

    nav_options.src = nav_options_icon_darkmode;

    console.log("Dark mode enabled.");
}

const disableDarkMode = () => {
    // 1. Remove the class from the body
    document.body.classList.remove('dark_theme');

    // 2. Update darkMode in localStorage 
    localStorage.setItem('dark_theme', null);

    // 3. Set icons to light icons
    nav_collection.src = nav_collection_icon;
    nav_faq.src = nav_faq_icon;
    nav_home.src = nav_home_icon;
    nav_search.src = nav_search_icon;

    nav_options.src = nav_options_icon;
    
    console.log("Dark mode disabled.");
}

// If the user already visited and enabled darkMode, start things off with it on
if (darkMode === 'enabled') {
    enableDarkMode();
}

// When the user clicks the button
darkModeToggle.addEventListener('click', () => {
    // Get their darkMode setting
    darkMode = localStorage.getItem('dark_theme');

    // If it is not currently enabled, enable it
    if (darkMode !== 'enabled') {
        enableDarkMode();
        // If it has been enabled, turn it off
    } else {
        disableDarkMode();
    }
});