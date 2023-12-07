#include <Ethernet.h>//libreria ethernet
#include <SPI.h>//libreria ethernet
#include <Adafruit_MLX90614.h>
#include <Wire.h>

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; // Direccion MAC
byte ip[] = { 192,168,0,202 }; // Direccion IP del Arduino
byte server[] = { 192,168,0,200 }; // Direccion IP del servidor192,168,0,14

int lecturaP=0; //Lectura del push
Adafruit_MLX90614 mlx = Adafruit_MLX90614();
float TOH = 0;//Variable temperatura Objeto -Humano

int pulso=0;
int i=0; 

EthernetClient cliente;//objeto del ethernet

double P,pre;//variable presion
int hum, temp;//constantes para humedad
String estado;

void setup() {
  pinMode(13, OUTPUT);  
  Serial.begin(9600);
  //Serial.println("Conectando...");
  Ethernet.begin(mac, ip); // Inicializamos el Ethernet Shield
  mlx.begin();
  pinMode(2,INPUT_PULLUP); //PUSH
  pinMode(A0,INPUT);//SENSOR
}
void tempNorm(){
  /*Serial.println("\nTEMPERATURA ESTABLE");
  Serial.println(TOH);
  Serial.print("GET http://localhost/MIB/conexion_arduino.php?valor="); // Enviamos los datos por GET
  Serial.println(TOH);
  Serial.println(pulso);  
 Serial.println(BPM);
  */
    cliente.print("GET http://localhost/MIB/conexion_arduino.php?valor="); // Enviamos los datos por GET
  cliente.print(TOH);
  cliente.println(" HTTP/1.0");
  cliente.println("User-Agent: Arduino 1.0");
  cliente.println();

  
}

void tempAlta(){
/*
  Serial.println("\nTEMPERATURA ALTA");
  Serial.println(TOH);
  Serial.print("GET http://localhost/MIB/conexion_arduino.php?valor="); // Enviamos los datos por GET
  Serial.println(TOH);
  Serial.println(pulso);  
 Serial.println(BPM);
 */
    cliente.print("GET http://localhost/MIB/conexion_arduino.php?valor="); // Enviamos los datos por GET
  cliente.print(TOH);
  cliente.println(" HTTP/1.0");
  cliente.println("User-Agent: Arduino 1.0");
  cliente.println();
}


void loop() {
  lecturaP=digitalRead(2);
  pulso = analogRead(A0); 
  int PPM=map(pulso,1000,0,200,0);
  if (pulso >= 530) {                   // Enciende led 13 cuando el pulso pasa de un valor (debe ajustarse)
    digitalWrite(13, HIGH);
 }  
 else{
    digitalWrite(13, LOW);
 }  

  if (cliente.connect(server, 80)>0) {
    if(lecturaP==0){
        if(i){
        cliente.print("GET http://localhost/MIB/conexion_arduino_PPM.php?PPM="); // Enviamos los datos por GET
        cliente.print(PPM);
        cliente.println(" HTTP/1.0");
        cliente.println("User-Agent: Arduino 1.0");
        cliente.println();
        i=0;
        }
        else
          i=1;
     lecturaTemp();
      if(TOH<38.0){
        tempNorm();
        delay(100);
      }
      else if(TOH>=38.0){
        tempAlta();
        delay(100);
      }
    }
  }
 
  
  if (!cliente.connected()) {
    Serial.println("Desconectando");
    delay(100);
  }
  cliente.stop();
  cliente.flush();
}
void lecturaTemp(){
  for(int i=0; i<20; i++){
    TOH=mlx.readObjectTempC() + TOH;
    delay(1);
  }  
  TOH /=20.0;
  TOH+=1.95;//Calibrar el factor.
}
