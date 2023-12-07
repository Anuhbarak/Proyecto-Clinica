#include <SPI.h>
#include <Ethernet.h>
#include <Adafruit_MLX90614.h>
#include <Wire.h>
#include <SoftwareSerial.h>
SoftwareSerial BT1(10, 11); // RX | TX
                               // Introduzca una direcciÛn MAC y la direcciÛn IP para el controlador
byte mac[] = { 
0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(192,168,0,200);   // Esta direccion IP debe ser cambiada obligatoriamente 
                              // dependiendo de la subred de su Area Local y es la que 
                              // usara para conectarse por el Navegador.
EthernetServer server(80);    // Puerto 80 por defecto para HTTP

int lecturaP=0; //Lectura del push
Adafruit_MLX90614 mlx = Adafruit_MLX90614();
float TOH = 0;//Variable temperatura Objeto -Humano

int dato;
int pulso=0;
int i=0; 

double P,pre;//variable presion
int hum, temp;//constantes para humedad
String estado;


void setup() {
  Ethernet.begin(mac, ip);    //inicializa la conexiÛn Ethernet y el servidor
  server.begin();
  pinMode(13, OUTPUT);  
  Serial.begin(9600);
  //Serial.println("Conectando...");
  BT1.begin(9600); 
  Ethernet.begin(mac, ip); // Inicializamos el Ethernet Shield
  mlx.begin();
  pinMode(2,INPUT_PULLUP); //PUSH
  pinMode(A0,INPUT);//SENSOR
}

void lecturaTemp(){
  for(int i=0; i<20; i++){
    TOH=mlx.readObjectTempC() + TOH;
    delay(1);
  }  
  TOH /=20.0;
  TOH+=2.1;//Calibrar el factor.
}
void loop() {
  if(BT1.available()>0 ){
  dato = BT1.read () ; 
}
  EthernetClient cliente = server.available(); // Inicializa cliente como servidor ethernet
  if (cliente) {
    boolean currentLineIsBlank = true;
    while (cliente.connected()) {
      if (cliente.available()) {
        char c = cliente.read();
        if (c == '\n' && currentLineIsBlank) { 
          cliente.println("HTTP/1.1 200 OK");
          cliente.println("Content-Type: text/html");   // Envia el encabezado en codigo HTML estandar
          cliente.println("Connection: close"); 
          cliente.println("Refresh: 1");  // refresca la pagina automaticamente cada 3 segundos
          cliente.println();
          cliente.println("<!DOCTYPE HTML>"); 
          cliente.println("<html>");
          cliente.println("<HEAD>");
          cliente.println("<TITLE>Ethernet Monitor</TITLE>");
          cliente.println("</HEAD>");
          cliente.println("<style type='text/css'>");
          cliente.println("p {text-align:center;");
          cliente.println("font-size: 20px;");
          cliente.println("}");
          cliente.println("h2 {text-align:center;");
          cliente.println("color: #0099FF;");
          cliente.println("font-size: 40px;");
          cliente.println("}");
          cliente.println("</style>");
          cliente.println("<BODY>");
          cliente.println("<hr />");
          cliente.println("<H2>TUCLINICA-NET.COM </H2>");// Tu estatura es:
          cliente.println("<br />");
          cliente.println("<p>");
          cliente.println(dato);   
          cliente.println("</p>");    
          cliente.println("<br />");
          cliente.println("<hr />");
          cliente.println("<H2>Monitoreando tu mano</H2>");
          cliente.println("<br />");
         // cliente.println("<center>");
          lecturaTemp();
          if(TOH <34){
          cliente.println("<p>Ingresa la mano al guante </p>");  
          }
          else{
          cliente.println("<p>Tu temperatura es:</p>");
          cliente.println("<p>");
          cliente.println(TOH);
          cliente.println("</p>");
          
          cliente.println("<p>Retire la mano del guante</p>"); // "Tus Pulsaciones son:"
          int PPM = Serial.read();
          if(100 < PPM > 50){
          cliente.println("<p>");
          cliente.println(PPM);
          cliente.println(" LPM");
          cliente.println("</p>");
          }
          else if(PPM > 100){
          PPM=PPM-40;
          cliente.println("<p>");
          cliente.println(PPM);
          cliente.println(" LPM");
          cliente.println("</p>");
          }
          else if(40 > PPM > 20){
          PPM=PPM+20;
          cliente.println("<p>");
          cliente.println(PPM);
          cliente.println(" LPM");
          cliente.println("</p>");
          }
          else 
          
         cliente.println("<p> </p>"); //Escanenando...
          }
          

          break;
        }
        if (c == '\n') {
           currentLineIsBlank = true;
        } 
        else if (c != '\r') {
           currentLineIsBlank = false;
        }
      }
    }
   delay(10000);           // Da tiempo al Servidor para que reciba los datos 15ms
   cliente.stop();     // cierra la conexion
  }
}