const filterFormData = ( form, page = 1 ) => {
    let $this = form,
        brand = $this.car_brand,
        type = $this.car_type,
        year = $this.car_year,
        colors = $this.colors;

    let priceFrom = $this.price_from,
        priceTo   = $this.price_to;

    const checkedColors = Array.from(colors).filter(color => color.checked);

    let arrayColors = [];
    checkedColors.forEach(input => {
        arrayColors.push(input.value)
    })

    let formData = new FormData();
    formData.append("action", "cars_filter");
    formData.append("nonce", theme_ajax.nonce);
    formData.append("brand", brand.value);
    formData.append("type", type.value);
    formData.append("year", year.value);
    formData.append('colors', JSON.stringify(arrayColors))
    formData.append('price_from', priceFrom.value )
    formData.append('price_to', priceTo.value )
    formData.append('page', page)

    return formData;
}

export default filterFormData;