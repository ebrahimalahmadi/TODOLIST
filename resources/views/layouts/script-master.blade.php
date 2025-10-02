 <script>
     // Modal utility functions
     function openModal(modalId) {
         const modal = document.getElementById(modalId);
         if (modal) modal.classList.remove("hidden");
     }

     function closeModal(modalId) {
         const modal = document.getElementById(modalId);
         if (modal) modal.classList.add("hidden");
     }
 </script>
