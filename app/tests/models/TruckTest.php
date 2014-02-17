<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;

class TruckTest extends TestCase {
  public function __construct()
    {
        // Prepare FactoryMuff
        $this->factory = new FactoryMuff;
    }

  public function testTruckInvalidWithoutName()
  {
    // Arrange
    $attrs = $this->factory->attributesFor('Truck', ['name' => '']);
    // var_dump($attrs);
    $validation = Validator::make($attrs, Truck::$rules);

    // Act
    $result = $validation->passes();

    // Assert
    $this->assertFalse($result, 'Validation should not have passed without a name');
  }

  public function testTruckInvalidWithoutEmail()
  {
    $attrs = $this->factory->attributesFor('Truck', ['email' => '']);
    $validation = Validator::make($attrs, Truck::$rules);

    $result = $validation->passes();

    $this->assertFalse($result, 'Validation should not have passed without an email');
  }

  public function testTruckInvalidWithoutProperEmail()
  {
    $attrs = $this->factory->attributesFor('Truck', ['email' => 'diego_at_tacomail_dot_com']);
    $validation = Validator::make($attrs, Truck::$rules);

    $result = $validation->passes();

    $this->assertFalse($result, 'Validation should not have passed with a improperly formatted email');
  }

  public function testTruckInvalidFromBadLogoURL()
  {
    $attrs = $this->factory->attributesFor('Truck', ['logo_url' => 'www.tacos.com']);
    $validation = Validator::make($attrs, Truck::$rules);

    $result = $validation->passes();

    $this->assertFalse($result, 'Validation should not have passed a bad logo url');
  }

  public function testTruckInvalidFromBadPictureURL()
  {
    $attrs = $this->factory->attributesFor('Truck', ['picture_url' => 'www.tacos.com']);
    $validation = Validator::make($attrs, Truck::$rules);

    $result = $validation->passes();

    $this->assertFalse($result, 'Validation should not have passed a bad picture url');
  }

  public function testTruckInvalidFromBadWebsiteURL()
  {
    $attrs = $this->factory->attributesFor('Truck', ['website_url' => 'www.tacos.com']);
    $validation = Validator::make($attrs, Truck::$rules);

    $result = $validation->passes();

    $this->assertFalse($result, 'Validation should not have passed a bad website url');
  }

}