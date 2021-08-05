@bookmark
Feature: Bookmark CRUD
  In order to manage the Bookmarks feature
  As a user
  I want to be able to create, update, list, get and delete Bookmark

  #################
  # CRUD scenario #
  #################
  @get
  Scenario: I should be able to read a Bookmark
    Given I send a "GET" request to "/bookmarks/a179e430-6356-4fb5-91b2-ead2e166fa77"
    Then the response status code should be 200
    And the JSON nodes should be equal to:
      | title     | bookmark_1                                      |
      | author    | Adah                                            |
      | createdAt | 2018-06-01T00:00:00+00:00                       |
      | url       | www.flickr.com/1234                             |
      | height    | 15                                              |
      | width     | 19                                              |
      | duration  | 358                                             |
      | type      | video                                           |
      | tags[0]   | fun                                             |
      | tags[1]   | sport                                           |
      | @id       | /bookmarks/a179e430-6356-4fb5-91b2-ead2e166fa77 |

  @get
  Scenario: I should be able to read a collection of Bookmarks
    Given I send a "GET" request to "/bookmarks"
    Then the response status code should be 200
    And I should see "bookmark_1"
    And I should see "bookmark_40"

  @put
  Scenario: I should be able to update a Bookmark
    Given I add "Content-Type" header equal to "application/json"
    And I send a "PUT" request to "/bookmarks/a179e430-6356-4fb5-91b2-ead2e166fa77" with body:
    """
    {
      "title": "bookmark_1 edited",
	  "author": "Adah edited",
	  "url": "www.flickr.com/1234",
	  "height": 25,
	  "width": 49,
	  "duration": 180
    }
    """
    And the JSON nodes should be equal to:
      | title     | bookmark_1 edited         |
      | author    | Adah edited               |
      | createdAt | 2018-06-01T00:00:00+00:00 |
      | url       | www.flickr.com/1234       |
      | height    | 25                        |
      | width     | 49                        |
      | duration  | 180                       |
    Then the response status code should be 200

  @post
  Scenario: I should be able to create a list of
    Given I add "Content-Type" header equal to "application/json"
    And I send a "POST" request to "/bookmarks" with body:
    """
    {
      "title": "Da bookmark creation",
	  "author": "new author",
	  "url": "www.vimeo.com/4321",
	  "height": 54,
	  "width": 89,
	  "duration": 720,
	  "type": "video"
    }
    """
    And the JSON nodes should be equal to:
      | title     | Da bookmark creation      |
      | author    | new author                |
      | url       | www.vimeo.com/4321        |
      | height    | 54                        |
      | width     | 89                        |
      | duration  | 720                       |
    Then the response status code should be 201

