describe('admin', () => {
    it('view tradingPools', () => {
      cy.visit('/admin');
    })

    it('view one tradingPool', () => {
        cy.visit('/admin');
        cy.contains('View pool').click();
        cy.url().should('include', 'trading-pool/');
    })
  })
