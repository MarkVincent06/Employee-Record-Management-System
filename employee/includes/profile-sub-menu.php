<div class="sub-menu-wrapper" id="sub-menu">
    <div class="sub-menu">
        <a href="#" class="sub-menu-link">
            <i class="fa-solid fa-gear"></i>
            <p>Change Password</p>
        </a>

        <a href="#" class="sub-menu-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Logout</p>
        </a>
    </div>

    <!-- JS script for opening and closing of the sub-menu -->
    <script>
        const subMenu = document.getElementById("sub-menu")
        
        function toggleSubMenu() {
            subMenu.classList.toggle('open-sub-menu')
        }

        // This closes the sub-menu when clicked outside of it
        window.onclick = e => {
            if(!e.target.matches('.avatar') && !e.target.matches('.profile-name')) {
                if(subMenu.classList.contains('open-sub-menu')) {
                    subMenu.classList.remove('open-sub-menu')     
                }
            }   
        }

        subMenu.addEventListener('click', e => e.stopPropagation())
    </script>
</div>