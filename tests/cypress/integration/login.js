describe('login', () => {
    it('Login as admin', () => {
        cy.visit('/login');
        cy.intercept('/login', []).as('login')
        cy.get('input[type=email]').type(Cypress.env('adminEmail'));
        cy.get('input[type=password]').type(Cypress.env('adminPassword'));
        cy.get('button[type=submit]').click();
        cy.wait('@login');
        cy.getCookie('cryptoscoreboard_session').should('exist')
    })
})
