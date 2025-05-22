    document.addEventListener('DOMContentLoaded', function() {
        // Get tab elements
        const accountTab = document.getElementById('account-tab');
        const passwordTab = document.getElementById('password-tab');
        
        // Get content sections
        const accountSettings = document.getElementById('account-settings');
        const passwordSettings = document.getElementById('password-settings');
        
        // Add click event listeners
        accountTab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active class
            accountTab.classList.add('active');
            passwordTab.classList.remove('active');
            
            // Show/hide content
            accountSettings.classList.remove('d-none');
            passwordSettings.classList.add('d-none');
        });
        
        passwordTab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active class
            passwordTab.classList.add('active');
            accountTab.classList.remove('active');
            
            // Show/hide content
            passwordSettings.classList.remove('d-none');
            accountSettings.classList.add('d-none');
        });
    });