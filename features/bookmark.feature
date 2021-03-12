@bookmark
Feature: Bookmark CRUD
  In order to manage the Bookmarks feature
  As a user
  I want to be able to create, update, list, get and delete Bookmark

  #################
  # CRUD scenario #
  #################
  @get
  Scenario: I should be able to read a Beneficiary
    Given I send a "GET" request to "/bookmarks/5ef4be34-fecc-4f33-98da-ef6c62b1d85d"
    Then the response status code should be 200
    And the JSON nodes should be equal to:
      | title                                | 1                                              |