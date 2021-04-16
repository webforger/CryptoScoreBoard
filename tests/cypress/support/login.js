Cypress.Commands.add("login", (email = null, password = null) => {

    cy.request({
        method: 'GET',
        url: '/sanctum/csrf-cookie'
    })

    email = email || Cypress.env('defaultEmail')
    password = password || Cypress.env('defaultPassword')
    let _token
    cy.visit('/login')
        .getCookie('XSRF-TOKEN')
        .then((cookie) => {
            cy.request({
                method: 'POST',
                url: '/login',
                form: true,
                body: {
                    email,
                    password
                },
                headers: {
                    // Base64 encoded string was URI encoded in headers. Decode it.
                    'X-XSRF-TOKEN': decodeURIComponent(cookie.value)
                }
            })
        })
})
