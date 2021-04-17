describe('test front app layout', () => {
    it('Open burger menu', () => {
        cy.visit('/');
        cy.get('.menu__btn').click();
        cy.get('[data-cy="menu-link_login"]').should('be.visible');
    })

    it('Navigate to /login', () => {
        cy.visit('/');
        cy.get('[data-cy="menu-link_login"] i').click();
        cy.url().should('include', '/login');
    })

    it('Navigate to a trading pool', () => {
        cy.visit('/');
        cy.get('[data-cy="open_trading_pool"]').first().click();
        cy.url().should('include', '/trading-pool/');
    })
})
