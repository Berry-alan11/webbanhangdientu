
  
        // For demonstration purposes only
        // In a real application, this would be handled by proper cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toggleCartBtn = document.querySelector('.cart-icon');
            const emptyCartEl = document.querySelector('.cart-empty');
            const cartItemsEl = document.querySelector('.cart-items');
            const cartSummaryEl = document.querySelector('.cart-summary');
            
            let cartEmpty = true;
            
            toggleCartBtn.addEventListener('click', function(e) {
                e.preventDefault();
                cartEmpty = !cartEmpty;
                
                if (cartEmpty) {
                    emptyCartEl.style.display = 'block';
                    cartItemsEl.style.display = 'none';
                    cartSummaryEl.style.display = 'none';
                    toggleCartBtn.querySelector('span').textContent = '0';
                } else {
                    emptyCartEl.style.display = 'none';
                    cartItemsEl.style.display = 'block';
                    cartSummaryEl.style.display = 'block';
                    toggleCartBtn.querySelector('span').textContent = '2';
                }
            });
        });
       


