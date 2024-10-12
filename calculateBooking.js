function calculateTotalAmount() {
    const totalDays = document.getElementById('daily_rate').value;
    if (totalDays) {
        const totalAmount = dailyRate * totalDays;
        document.getElementById('total_amount').value = totalAmount.toFixed(2);
    } else {
        document.getElementById('total_amount').value = dailyRate.toFixed(2);
    }
}