describe('index', () => {
    it('Open Documentation', () => {
      cy.visit('/');
      cy.contains('Logo').click();
      cy.url().should('include', 'home');
    })
  })