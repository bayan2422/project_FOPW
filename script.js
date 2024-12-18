// Select all product items
document.querySelectorAll('.product-item').forEach(product => {
    const addButton = product.querySelector('.add-button'); // "+" button
    const removeButton = product.querySelector('.remove-button'); // "-" button
    const counter = product.querySelector('.counter'); // Counter display
    let count = 0; // Initialize counter for each product

    // Increment Counter
    addButton.addEventListener('click', () => {
        count++;
        counter.textContent = count; // Update counter display
    });

    // Decrement Counter 
    removeButton.addEventListener('click', () => {
        if (count > 0) {
            count--;
        }
        counter.textContent = count; // Update counter display
    });
});



        